@extends('layouts.main')
@section('body')


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar noticia</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="equis" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que deseas eliminar tu historia? Esta acción no puede ser revertida.
                </div>
                <div class="modal-footer">
                    <button type="button" id="volver" data-bs-dismiss="modal">Volver</button>
                    <a id="eliminar" href="#" class="eliminar">Eliminar</a>
                </div>
                </div>
            </div>
            </div>

        <section id="seccionPanel">
            <div class="container">
            <h1 class="mb-5">
                    Tus historias
                </h1>

            <div class="deTabla">
            <table>
            <tr>
                <th>Noticia</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th class="noBorde">Acciones</th>
            </tr>
            @foreach($noticias as $noticia)
                <tr>
                    <td class="noBordeAbajo">{{$noticia->titulo}}</td>
                    <td class="noBordeAbajo">{{$noticia->descripcion}}</td>
                    <td class="noBordeAbajo">{{$noticia->categoria->nombre}}</td>
                    <td class="noBordeAbajo">{{$noticia->fecha}}</td>
                    <td class="noBordeAbajo acciones"><div class="p-3"><a href="<?= url('historias/' . $noticia->id . '/editar');?>" class="editar">Editar</a></div> <div><button id="{{$noticia->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?= url('historias/' . $noticia->id . '/eliminar');?>" class="noticia_eliminar eliminar">Eliminar</button></div></td>
                </tr>
            @endforeach
            </table>
            </div>
            </div>
        </section>

        <script src="{{ URL::to('js/eliminar_noticia.js') }}"></script>
@endsection