<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\Bloque;
use App\Models\Usuario;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File; 
use DateTime;
use Redirect;
use URL;

class NoticiaController extends Controller
{
    public function comentar(Request $request)
    {
        $noticia = Noticia::find($request->route('id'));
        $usuario = Auth::user();
        $comentario = new Comentario();
        $comentario->noticia_id = $noticia->id;
        $comentario->comentario = $request->comentario;
        $comentario->usuario_id = $usuario->id;
        $comentario->fecha = new DateTime(); //arreglar aca Y crear noticia
        $comentario->save();
        return Redirect::to(URL::previous() . "#divComentarios");
    }

    public function like(Request $request)
    {
        if($request->likeStatus == 'Me gusta'){
            $noticia = Noticia::find($request->route('id'));
            $usuario = Auth::user();
            $noticia->usuarios_like()->attach($usuario);
            $noticia->cantidad_likes = $noticia->usuarios_like()->count();
            $noticia->save();

        } else if ($request->likeStatus == 'Ya no me gusta'){
            $noticia = Noticia::find($request->route('id'));
            $usuario = Auth::user();
            $noticia->usuarios_like()->detach($usuario);
            $noticia->cantidad_likes = $noticia->usuarios_like()->count();
            $noticia->save();
        } 

        return Redirect::to(URL::previous() . "#likes");
    }

    public function leerNoticia(Request $request) {
        $noticia_id = $request->route('id');
        $noticia = Noticia::find($noticia_id);
        $likeActual = null;
        if(Auth::check()) {
            $likeActual = $noticia->usuarios_like()->where('usuario_id', Auth::user()->id)->first();
        }
        
        $ultimasNoticiasRelacionadas = Noticia::where('categoria_id', $noticia->categoria_id)
        ->orderBy('fecha', 'desc')
        ->take(4)->get();
        return view('leernoticia', [

            'likeActual' => $likeActual,
            'noticia' => $noticia,
            'ultimasNoticiasRelacionadas' => $ultimasNoticiasRelacionadas,
            'cantidadLikes' => count($noticia->usuarios_like),
            'cantidadComentarios' => count($noticia->comentarios),
        ]);
    }


    public function historiasList(Request $request) {
        $categorias = Categoria::all();
        if ($request->input('busqueda') != null) {
            $noticias = Noticia::take(16);
            if ($request->input('busqueda') != null) {  
                $noticias = $noticias->where('titulo', 'like', '%' . $request->input('busqueda') . '%');
            }
            if ($request->input('ordenamiento') == 'antiguo') {
                $noticias = $noticias->orderBy('fecha', 'asc');
            } else if ($request->input('ordenamiento') == 'masVisto') {
                $noticias = $noticias->orderBy('cantidad_vistos', 'desc');
            } else if ($request->input('ordenamiento') == 'masVotado') {
                $noticias = $noticias->orderBy('cantidad_likes', 'desc');
            } else {
                $noticias = $noticias->orderBy('fecha', 'desc');
            }

            if ($request->input('categoria') != null) {
                $noticias = $noticias->where('categoria_id', $request->input('categoria'));
            }
            $noticias = $noticias->get();
        } else {
            $noticias = Noticia::all();
        }

        if (Auth::user()&&Auth::user()->es_admin) {
            return view('paneladmin', [
                'noticias' => $noticias,
                'categorias' => $categorias,
                'busqueda' => $request->get('busqueda'),
            ]);
        } else {
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    } /*para 2do tp*/

    public function nuevoForm()
    {
        $categorias = Categoria::all();
        return view('nuevahistoria', [
            'categorias'=> $categorias,
            'noticia' => null,
        ]);
    }

    public function editarForm(Request $request){
        $categorias = Categoria::all();
        $noticia = Noticia::find($request->route('id'));
        if (Auth::check() && (Auth::user()->es_admin || Auth::user()->id == $noticia->usuario->id)) {
            return view('nuevahistoria', [
                'categorias'=> $categorias,
                'noticia' => $noticia
                
            ]);
        } else {
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    }

    public function eliminarComentario(Request $request){
        $comentario = Comentario::find($request->route('id'));
        if (Auth::check() && (Auth::user()->es_admin || Auth::user()->id == $comentario->usuario_id)) {
            $comentario->delete();
            return Redirect::to(URL::previous() . "#divComentarios");
        } else {
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    }

    public function eliminarNoticia(Request $request){
        $noticia = Noticia::find($request->route('id'));
        if (Auth::check() && (Auth::user()->es_admin || Auth::user()->id == $noticia->usuario_id)) {
            if(File::exists('img/noticias/' . $noticia->imagen_url)) {
                File::delete('img/noticias/' . $noticia->imagen_url);
            }
            foreach ($noticia->bloques as $bloque) {
                if(File::exists('img/noticias/' . $bloque->imagen_url)) {
                    File::delete('img/noticias/' . $bloque->imagen_url);
                }
            }
            Bloque::where('noticia_id', $noticia->id)->delete();
            Comentario::where('noticia_id', $noticia->id)->delete();
            $noticia->usuarios_like()->detach();
            $noticia->delete();
            $route = $request->route('id') == Auth::user()->id ? 'user.historias' : 'historia.historias';
            return redirect()
                ->back()
                ->with('message.success', 'Noticia eliminada');
        } else {
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    }

    public function actualizar(Request $request){
        date_default_timezone_set('UTC');

        $noticia = Noticia::find($request->route('id'));
        $noticia->titulo = $request->input('titulo');
        $noticia->descripcion = $request->input('descripcion');
        $noticia->categoria_id = $request->input('categoria');
        $noticia->fecha = new DateTime('now');
        $noticia->save();
        $this->editImage($request, 'imagen', $noticia->imagen_url);
        $bloqueQuery = Bloque::where('noticia_id', $noticia->id);
        $bloques = $bloqueQuery->get();
        foreach ($bloques as $bloque) {
            File::delete($bloque->imagen_url);
        }


        $bloqueQuery->delete();

        $text = $request->get('text_1');
        $image = $request->get('image_1');
        for($i = 1; $text != null; $i++) {
            $bloque_texto = new Bloque([
                'noticia_id' => $noticia->id,
                'texto' => $text,
                'posicion' => $i,
                'imagen_url' => $this->uploadImage($request, 'image_' . $i),
            ]);
            $bloque_texto->save();
            $text = $request->get('text_'.($i+1));
            $image = $request->get('image_'.($i+1));
        }    
        return redirect()->route('home.home');
    }

    public function nuevo(Request $request) {
        $tituloIncompleto = strlen($request->get('titulo'))<10 ;
        $descripcionIncompleto = strlen($request->get('descripcion'))<20 ;
        $cuerpoVacio = false;
        $imagenVacia = !$request->hasFile('imagen');
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'text_')) {
                if ($value == '') {
                    $cuerpoVacio = true;
                }
            }    
        }

        if ($tituloIncompleto || $descripcionIncompleto || $cuerpoVacio || $imagenVacia) {
            return redirect()
                ->route('historia.nuevoForm')
                ->with('titulo', $request->get('titulo'))
                ->with('descripcion', $request->get('descripcion'))
                ->with('imagenVacia', $imagenVacia)
                ->with('tituloIncompleto', $tituloIncompleto)
                ->with('descripcionIncompleto', $descripcionIncompleto)
                ->with('cuerpoVacio', $cuerpoVacio);
        }

        date_default_timezone_set('UTC');
        $coverName = $this->uploadImage($request, 'imagen');
        $noticia = new Noticia([
            'categoria_id' => $request->get('categoria'),
            'titulo' => $request->get('titulo'),
            'imagen_url' => $coverName, 
            'descripcion' => $request->get('descripcion'),
            'cantidad_likes' => 0,
            'cantidad_vistos' => 0,
            'usuario_id' => Auth::user()->id,
            'activo' => 1,
            'fecha' => new DateTime('now'),
        ]);
        $noticia->save();

        $text = $request->get('text_1');
        $image = $this->uploadImage($request, 'image_1');//$request->get('image_1');
        for($i = 1; $text != null; $i++) {
            $bloque_texto = new Bloque([
                'noticia_id' => $noticia->id,
                'imagen_url' => $image,
                'texto' => $text,
                'posicion' => $i,
            ]);
        $bloque_texto->save();
        $text = $request->get('text_'.($i+1));
        $image = $this->uploadImage($request, 'image_'. ($i+1));
        //$request->get('image_'.($i+1));
        }

        return redirect('/')->with('success', 'Historia creada');
    } 

    protected function uploadImage(Request $request, $field){
        if($request->hasFile($field)) {
            $filename = date('YmdHis') . "." . $request->file($field)->getClientOriginalExtension();

            // Redimensionamos la imagen a otro tamaño máximo.
            Image::make($request->file($field))->resize(744, 9999, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->resizeCanvas(744, 300, 'center')
            ->save(public_path('img\\noticias\\' . $filename));
            return $filename;
        }
        return null;
    }

    protected function editImage(Request $request, $field, $filename){
        if($request->hasFile($field)) {

            // Redimensionamos la imagen a otro tamaño máximo.
            Image::make($request->file($field))->resize(744, 9999, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->resizeCanvas(744, 300, 'center')
            ->save('img/noticias/'. $filename);
            return $filename;
        }
        return null;
    }
}