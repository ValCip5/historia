<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $categorias = Categoria::all();
        /*$ultimasNoticias = Noticia::where('titulo', 'like', '%' . $request->input('busqueda') . '%')->get();*/
        $ultimasNoticias = Noticia::take(16);
        $anchor = false;

        if ($request->input('ordenamiento') == 'antiguo') {
            $ultimasNoticias = $ultimasNoticias->orderBy('fecha', 'asc');
        } else if ($request->input('ordenamiento') == 'masVisto') {
            $ultimasNoticias = $ultimasNoticias->orderBy('cantidad_vistos', 'desc');
        } else if ($request->input('ordenamiento') == 'masVotado') {
            $ultimasNoticias = $ultimasNoticias->orderBy('cantidad_likes', 'desc');
        } else {
            $ultimasNoticias = $ultimasNoticias->orderBy('fecha', 'desc');
        }

        if ($request->input('busqueda') != '') {
            $ultimasNoticias = $ultimasNoticias->where('titulo', 'like', '%' . $request->input('busqueda') . '%');
        }

        if ($request->input('categoria') != null) {
            $ultimasNoticias = $ultimasNoticias->where('categoria_id', $request->input('categoria'));
        }
        $ultimasNoticias = $ultimasNoticias->get();

        if ($request->input('buscar') != null) {
            $anchor = true;
        }

        $mejoresNoticias = Noticia::orderBy('cantidad_vistos', 'desc')->take(8)->get();
        return view('home', [
            'categorias'=> $categorias,
            'mejoresNoticias' => $mejoresNoticias,
            'ultimasNoticias' => $ultimasNoticias,
            'busqueda' => $request->input('busqueda'),
            'anchor' => $anchor,
         ]);
    }
}
