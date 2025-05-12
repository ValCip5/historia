@extends('layouts.main')
@section('body')

<section id="seccionRegistrarse">
<div class="divIngresar">
        <h1 class="mb-2">Perfil</h1>
        <p class="mb-5 perfilP">La foto será mostrada hasta una resolución máxima de 100x100.
        Fuera del perfil, se verá a 40x40.</p>
        <div class="text-center">
        <img class="fotoDePerfil mb-3" src="{{ URL::to('img/usuarios/' . Auth::user()->foto_url) }}" alt="Perfil del usuario">
        <form class="mb-5" enctype="multipart/form-data" action="<?= url('usuarios/' . Auth::user()->id);?>" method="post">
            @csrf
            <input type="file" id="imagen" name="imagen" accept="image/*">
            <button id="cambiar" type="submit">Cambiar</button>
            </form>
</div>

    </div>  
</section>

@endsection