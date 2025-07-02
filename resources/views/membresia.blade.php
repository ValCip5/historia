@extends('layouts.main')
@section('body')

<section id="seccionMembresia">
    <div class="container">
        <h1 class="text-center">Membresía</h1>
        <p class="text-center">Descubrí lo que podes llegar a hacer más allá
            en Historía
        </p>

    <div class="beneficios row col-lg-10 col-sm-12 mx-auto mt-5">
        <div class="col-lg-6 col-sm-12 p-3">
            <div class="cartaComun border rounded p-4 h-100">
                <h2>Normal</h2>
                <p>Esto es lo que dispones siendo un usuario común</p>
                <ul>
                    <li>─ 1 historia que publicar por día</li>
                    <li>─ 10 visitas a otras historias del sitio</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 p-3">
            <div class="cartaPremium p-4 rounded">
                <h2>Premium</h2>
                <p>Esto es lo que dispones siendo un usuario usuario premium. ¡Gracias por tu aporte!</p>
                <ul>
                    <li>─ Cantidad ilimitada de noticias que publicar</li>
                    <li class="mb-5">─ Visitas ilimitadas a otras historias del sitio</li>
                </ul>
                @if(Auth::check() && !Auth::user()->es_miembro)
                    <a href="{{ url('/pasarelapago') }}" class="cta">Suscribirme por $15.000 AR$</a>
                @elseif (Auth::check() && Auth::user()->es_miembro)
                    <p>Ya sos miembro! Muchas gracias por tu aporte!</p>
                    <form action="{{ url('/api/usuarios/' . Auth::user()->id . '/desuscribirse') }}" method="post">
                        @csrf
                        <button type="submit" class="cta">Quiero desuscribirme</button>
                    </form>
                @else
                    <a href="{{ url('/iniciarsesion') }}" class="cta">Suscribirme por $15.000 AR$</a>
                @endif
            </div>
        </div>
    </div>
    </div>
</section>

@endsection