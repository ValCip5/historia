@extends('layouts.main')
@section('body')

<section id="seccionRegistrarse">
<div class="divIngresar">
        <h1 class="mb-4">Iniciar Sesión</h1>
        @if (isset($message))
            <div>
                <p>{{$message}}</p>
            </div>
        @endif
        <form class="mb-5" action="<?= url('iniciarsesion');?>" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                @if (session('usuario'))
                <input type="text" class="form-control" value="{{session('usuario')}}" name="usuario"/>
                @else
                <input type="text" class="form-control" name="usuario"/>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control"/>
            </div>
            <div class="text-center">
            <button type="submit" class="cta mt-3">Ingresar</button>
            </div>
            @if (session('errores'))
                <div class="hayErrores">
                    @foreach (session('errores') as $error)
                    <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif    
            </form>

            <p class="aviso">Si no tienes cuenta, regístrate <a href="<?= url('registrar');?>">aquí</a></p>
    </div>  
</section>

@endsection