@extends('layouts.main')
@section('body')

<section id="seccionRegistrarse">
    <div class="divIngresar">
        <h1>Registrarse</h1>
        <form class="mt-4 mb-5" action="<?= url('/api/usuarios');?>" method="post"> 
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                @if(session('usuario'))
                <input type="text" name="nombre" value="{{session('nombre')}}" class="form-control">
                @else
                <input type="text" name="nombre" class="form-control">
                @endif
                
                @if(session('nombreVacio'))
                <div class="hayErrores">
                    <p>El nombre no puede quedar vacío</p>
                </div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label>
                @if(session('usuario'))
                <input type="text" name="apellido" value="{{session('apellido')}}" class="form-control">
                @else
                <input type="text" name="apellido" class="form-control">
                @endif
                
                @if(session('apellidoVacio'))
                <div class="hayErrores">
                    <p>El apellido no puede quedar vacío</p>
                </div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                @if(session('usuario'))
                <input type="email" name="email" value="{{session('email')}}" class="form-control">
                @else
                <input type="email" name="email" class="form-control">
                @endif
                
                @if(session('emailVacio'))
                <div class="hayErrores">
                    <p>El email no puede quedar vacío</p>
                </div>
                @elseif(session('emailSinArroba'))
                <div class="hayErrores">
                    <p>El email debe de contener una arroba</p>
                </div>
                @elseif(session('emailRepetido'))
                <div class="hayErrores">
                    <p>Este email ya se encuentra registrado, intenta con otro</p>
                </div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                @if(session('usuario'))
                <input type="text" name="username" value="{{session('usuario')}}" class="form-control">
                @else
                <input type="text" name="username" class="form-control">
                @endif
                
                @if(session('usuarioVacio'))
                <div class="hayErrores">
                    <p>El usuario no puede quedar vacío</p>
                </div>
                @elseif(session('usuarioRepetido'))
                <div class="hayErrores">
                    <p>Este nombre de usuario ya se encuentra registrado, intenta con otro</p>
                </div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control">
                @if(session('contraseniaVacio'))
                <div class="hayErrores">
                    <p>La contraseña no puede quedar vacía</p>
                </div>
                @endif
            </div>
            <div class="text-center">
            <button type="submit" class="mt-3 cta">Registrarse</button>
            </div>
            </form>
            <p class="aviso">Si ya tienes cuenta, inicia sesión <a href="<?= url('iniciarsesion');?>">aquí</a></p>
    </div>  
</section>

@endsection