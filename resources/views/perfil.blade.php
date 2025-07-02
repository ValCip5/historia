@extends('layouts.main')
@section('body')

<section id="seccionRegistrarse">
<div class="divIngresar">
        <h1 class="mb-2">Perfil</h1>
        <p class="mb-5 perfilP">La foto será mostrada hasta una resolución máxima de 100x100.
        Fuera del perfil, se verá a 40x40.</p>
        <div class="text-center">
            <img class="fotoDePerfil mb-3" src="{{ URL::to('img/usuarios/' . Auth::user()->foto_url) }}" alt="Perfil del usuario">
            <form class="mb-5" enctype="multipart/form-data" action="<?= url('usuarios/' . Auth::user()->id.'/imagen');?>" method="post">
                @csrf
                <input type="file" id="imagen" name="imagen" accept="image/*">
                <button id="cambiar" type="submit">Cambiar</button>
            </form>
            <form action="{{ url('usuarios/' . Auth::user()->id) }}" method="post">
                @csrf
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" value="{{Auth::user()->nombre}}">
                </div>

                <div>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" value="{{Auth::user()->apellido}}">
                </div>

                <button type="submit">Guardar</button>
            </form>
        </div>
</div>  
</section>

<section>
    <div class="container infoMembresia">
        <div class="row col-lg-7 col-sm-12 mx-auto">
            <h2 class="mb-4">Información relevante</h2>
            <div class="col-lg-6 col-sm-12 p-2">
                <div class="border rounded p-4">
                <h3>
                    Está suscrito a la membresía
                </h3>
                <p>
                    {{Auth::user()->es_miembro ? 'Sí' : 'No'}}
                </p>
                @if(!Auth::user()->es_miembro)
                    <a href="{{ url('/membresia') }}" class="cta">Suscribirme</a>
                @else
                    <form action="{{ url('/api/usuarios/' . Auth::user()->id . '/desuscribirse') }}" method="post">
                        @csrf
                        <button type="submit" class="cta">Desuscribirme</button>
                    </form>    
                @endif
            </div>
        </div>
             <div class="col-lg-6 col-sm-12 p-3 h-100">
                <div class="border rounded p-4 h-100">
                    <h3>
                        Historial de subscripción
                    </h3>
                    @if(Auth::user()->es_miembro)
                        @php
                            $fecha = new DateTime(Auth::user()->subscribed_at);
                        @endphp
                        <p>
                           subscrito desde {{$fecha->format('d/m/Y')}} a las {{$fecha->format('H:i:s')}}
                        </p>
                    @else
                        <p>
                            Nunca se ha subscripto
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</section>

@endsection