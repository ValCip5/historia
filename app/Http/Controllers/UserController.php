<?php
namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File; 

class UserController extends Controller
{
    public function registroForm()
    {
        return view('registrarse');
    }

    public function historiasList(Request $request){ 
        if(Auth::check()&&Auth::user()->id==$request->route('id')){
            $noticias = Noticia::where('usuario_id', Auth::user()->id)->get();
            return view('panelusuario', [
                'noticias' => $noticias,
            ]);
        }
        else{
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    }

    public function registro(Request $request)
    {
        $nombreVacio = false;
        $apellidoVacio = false;
        $emailVacio = false;
        $usuarioVacio = false;
        $contraseniaVacio = false;
        $emailSinArroba = false;
        $emailRepetido = false;
        $usuarioRepetido = false;
        
        
        if ($request->get('nombre') == '') {
            $nombreVacio = true;
        }
        
        if ($request->get('apellido') == '') {
            $apellidoVacio = true;
        }

        if ($request->get('email') == '') {
            $emailVacio = true;
        }

        if ($request->get('username') == '') {
            $usuarioVacio = true;
        }

        if ($request->get('password') == '') {
            $contraseniaVacio = true;
        }

        if (!str_contains($request->get('email'), '@')) {
            $emailSinArroba = true;
        }

        if (Usuario::where('email', $request->get('email'))->exists()) {
            $emailRepetido = true;
        }

        if (Usuario::where('username', $request->get('username'))->exists()) {
            $usuarioRepetido = true;
        }

        if($nombreVacio || $apellidoVacio || $emailVacio || $usuarioVacio || $contraseniaVacio || $emailSinArroba || $emailRepetido || $usuarioRepetido) {
            return redirect()
                ->route('user.registroForm')
                ->with('nombre', $request->get('nombre'))
                ->with('apellido', $request->get('apellido'))
                ->with('email', $request->get('email'))
                ->with('usuario', $request->get('username'))
                ->with('usuarioVacio', $usuarioVacio)
                ->with('contraseniaVacio', $contraseniaVacio)
                ->with('nombreVacio', $nombreVacio)
                ->with('apellidoVacio', $apellidoVacio)
                ->with('emailVacio', $emailVacio)
                ->with('emailSinArroba', $emailSinArroba)
                ->with('emailRepetido', $emailRepetido)
                ->with('usuarioRepetido', $usuarioRepetido);
            }

        $user = new Usuario([
            'username' => $request->get('username'),
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'es_miembro' => false,
            'es_admin' => false,
            'foto_url' => 'perfil.png', 
        ]);
        $user->save();
        return redirect('iniciarsesion')->with('success', 'Usuario creado');
    }

    public function editForm(Request $request){
        if(Auth::check()&&Auth::user()->id==$request->route('id')){
            return view('perfil');
        }
        else{
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    }

    public function editarImagen(Request $request) {
        $user = Auth::user();
        $user->foto_url = $this->uploadImage($request, 'imagen');
        $user->save();
        return view('perfil');
    }

    public function editar(Request $request) {
        $user = Auth::user();
        $user->nombre = $request->get('nombre');
        $user->apellido = $request->get('apellido');
        $user->save();
        return view('perfil');
    }

    public function usuariosAdminList(Request $request) {
        if(Auth::check()&&Auth::user()->es_admin){
            $usuarios = Usuario::all();
            return view('paneladminmembresia', [
                'usuarios' => $usuarios,
            ]);
        }
        else{
            return redirect()
                ->route('home.home')
                ->with('message.error', 'Ruta inexistente');
        }
    }

    protected function uploadImage(Request $request, $field){
        if($request->hasFile($field)) {
            $filename = Auth::user()->username . $request->file($field)->getClientOriginalExtension();

            // Redimensionamos la imagen a otro tamaño máximo.
            Image::make($request->file($field))->resize(100, 9999, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->resizeCanvas(100, 100, 'center')
            ->save(public_path('img\\usuarios\\' . $filename));
            return $filename;
        }
        return null;
    }
}