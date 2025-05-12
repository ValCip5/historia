@extends('layouts.main')
@section('body')

        <section id="seccionUnoNoticia">
            <div id="divNoticia">
                <div class="descNoticia">
                    <h1 class="mb-3">
                        {{$noticia->titulo}}
                    </h1>
                    <p class="descripcion mb-0">
                        {{$noticia->descripcion}}
                    </p>
                    <img class="img-fluid my-4" src="{{ url('img/noticias/' . $noticia->imagen_url) }}" alt="Portada de {{$noticia->imagen_url}}">
                    <span><img width="40" class="me-2" src="{{ URL::to('img/usuarios/' . $noticia->usuario->foto_url) }}" alt="Perfil"> {{$noticia->usuario->nombre}} {{$noticia->usuario->apellido}} en {{$noticia->categoria->nombre}}, {{$noticia->fecha}}</span>
                </div>
                <div class="laNoticia mt-5">
                @foreach($noticia->bloques as $bloque)

                <p>
                    {{$bloque->texto}}
                </p>

                @if($bloque->imagen_url)
                    <img class="img-fluid mt-5 mb-4" src="{{ url('img/noticias/' . $bloque->imagen_url) }}" alt="Imagen de {{$bloque->imagen_url}}">
                @endif
                <div id="likes"></div>

                @endforeach
                <div class="mt-5 pt-4 comLike">
                    <button class="me-2"><i class="bi-send"></i></button><span class="numeros">{{$cantidadComentarios}}</span>
                    
                    <form action="<?= url('/api/historias/' . $noticia->id . '/likes');?>" method="post">
                    @csrf
                    @if($likeActual == null)
                    <input id="likeStatus" name="likeStatus" type="submit"  value="Me gusta" class="me-2 ms-4"/>
                    @else
                    <input id="likeStatus" name="likeStatus" type="submit" value="Ya no me gusta" class="me-2 ms-4"/>
                    @endif
                    </form>

                    <span class="numeros">{{$cantidadLikes}}</span>
                </div>
                </div>
            </div>
        </section>

        <section id="seccionComentarios">
            <div id="divComentarios">
                <h2>Comentarios</h2>
                <p>Tu comentario</p>
                <form action="<?= url('/api/historias/' . $noticia->id . '/comentarios');?>" method="post">
                    @csrf
                    <div>
                    <textarea id="tuComentario" class="mb-3" name="comentario" rows="5"></textarea>
                    </div>
                    <input type="submit" id="comentar" value="Comentar">
                </form>
                
                <ul class="pt-3">
                    @foreach($noticia->comentarios as $comentario)
                    <li class="mt-5 pt-3">
                        <img width="40" class="me-2" src="{{ URL::to('img/usuarios/' . $comentario->usuario->foto_url) }}" alt="Perfil">
                        @if($comentario->usuario->es_admin)
                        <span class="nombreAzul"> {{$comentario->usuario->nombre}} {{$comentario->usuario->apellido}}</span>
                        @else
                        <span> {{$comentario->usuario->nombre}} {{$comentario->usuario->apellido}}</span>
                        @endif
                        <p class="mt-3">
                            {{$comentario->comentario}}
                        </p>
                        <!--<button class="me-2"><i class="bi-heart"></i></button>-->
                        <span>{{$comentario->fecha}}</span>
                        @if(Auth::check() && ($comentario->usuario->id == Auth::user()->id || Auth::user()->es_admin))
                        <form class="mt-3" method="get" action="<?= url('api/comentarios/' . $comentario->id . '/eliminar');?>"><button class="eliCom" type="submit">Eliminar</button></form>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>

        
        <section id="seccionDosNoticia">
            <div class="container">
                <h2>
                <i class="bi-arrow-up-right-circle-fill me-2"></i>Recientes en {{$noticia->categoria->nombre}}
                </h2>
                <ol class="row">
                @foreach ($ultimasNoticiasRelacionadas as $noticiaRelacionada)
                <li class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <span><img width="40" class="me-2" src="{{ URL::to('img/usuarios/' . $noticia->usuario->foto_url) }}" alt="Perfil">{{$noticiaRelacionada->usuario->nombre}} {{$noticiaRelacionada->usuario->apellido}}</span>
                    <h3 class="my-3"><a href="<?= url('/historias/' . $noticiaRelacionada->id);?>">{{$noticiaRelacionada->titulo}}</a></h3>
                    <span class="tiempo">{{$noticiaRelacionada->fecha}}</span>
                </li>
                @endforeach
            </ol>
            </div>
        </section>

@endsection