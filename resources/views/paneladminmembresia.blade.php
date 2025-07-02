@extends('layouts.main')
@section('body')

<section id="seccionPanelAdmin">

            <div class="container">
            <h1 class="mb-5">
                    Panel de administración de usuarios
            </h1>

            <div class="deTablaAdmin">
            <table>
            <tr>
                <th>Foto de perfil</th>
                <th>Usuario</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Tiene membresía</th>
                <th>Fecha de subscripción</th>
                <th>Fecha de registro</th>
            </tr>
            @foreach($usuarios as $usuario)
            <tr>
                <td class="noBordeAbajo"><img width="40" class="me-2" src="{{ URL::to('img/usuarios/' . $usuario->foto_url) }}" alt="Perfil de {{$usuario->username}}"></td>
                <td class="noBordeAbajo">{{$usuario->username}}</td>
                <td class="noBordeAbajo">{{$usuario->nombre}} {{$usuario->apellido}}</td>
                <td class="noBordeAbajo">{{$usuario->email}}</td>
                <td class="noBordeAbajo">{{$usuario->es_miembro ? 'Sí' : 'No'}}</td>
                <td class="noBordeAbajo">{{$usuario->subscribed_at}}</td>
                <td class="noBordeAbajo">{{$usuario->created_at}}</td>
            </tr>
            @endforeach
            </table>
            </div>
            </div>
        </section>

        <script src="{{ URL::to('js/eliminar_noticia.js') }}"></script>
@endsection