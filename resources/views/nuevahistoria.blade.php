

@extends('layouts.main')
@section('body')

        <section id="seccionEscribir">
            <div id="divEscribir">
                @if (!$noticia)
                <h1 class="mb-3">
                    Creá tu noticia
                </h1>
                @else
                <h1 class="mb-3">
                    Editá tu noticia
                </h1>
                @endif
            @if ($noticia)
            <form action="<?= url('/historias/' . $noticia->id . '/edit');?>" method="post" enctype="multipart/form-data">
            @else
            <form action="<?= url('/api/historias');?>" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            
                <div class="mb-3">
                    <label class="mb-2" for="categorias">Elegí una categoría</label>
                    <div>
                        <select name="categoria" id="categorias">
                        @foreach($categorias as $categoria)
                        @if ($noticia && $noticia->categoria_id == $categoria->id)
                        <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                        @else
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tituloNoticia" class="form-label">Título</label>
                    @if ($noticia)
                    <input type="text" id="tituloNoticia" name="titulo" value="{{$noticia->titulo}}" class="form-control" placeholder="Ej: Mis especies de plantas favoritas">
                    @elseif(session('titulo'))
                    <input type="text" id="tituloNoticia" name="titulo" value="{{session('titulo')}}" class="form-control" placeholder="Ej: Mis especies de plantas favoritas">
                    @else
                    <input type="text" id="tituloNoticia" name="titulo" class="form-control" placeholder="Ej: Mis especies de plantas favoritas">
                    @endif

                    @if(session('tituloIncompleto'))
                    <div class="hayErrores">
                        <p>El título debe tener más de 10 caracteres.</p>
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de portada</label>
                    <div>
                    <input type="file" id="imagen" name="imagen" accept="image/*"/>
                    </div>

                    @if(session('imagenVacia'))
                    <div class="hayErrores">
                        <p>Debes de elegir una imagen para publicar tu noticia.</p>
                    </div>
                    @endif
                </div>
                <div class="pb-5 separador">
                    <label for="descripcion" class="form-label mt-4">Descripción</label>
                    @if ($noticia)
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Esta es una descripción que suele ser corta, la cual acompaña a la noticia y es un breve resumen de lo que trata.">{{$noticia->descripcion}}</textarea>
                    @elseif(session('descripcion'))
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Esta es una descripción que suele ser corta, la cual acompaña a la noticia y es un breve resumen de lo que trata.">{{session('descripcion')}}</textarea>
                    @else
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Esta es una descripción que suele ser corta, la cual acompaña a la noticia y es un breve resumen de lo que trata."></textarea>
                    @endif

                    @if(session('descripcionIncompleto'))
                    <div class="hayErrores">
                        <p>La descripción debe tener más de 20 caracteres.</p>
                    </div>
                    @endif
                </div>
                <div id="noticia-container">
                    <label class="form-label">Cuerpo de la noticia</label>
                    @if ($noticia)
                    @foreach ($noticia->bloques as $bloque)
                    <input id="cuerpo" type="hidden" value="{{$bloque->texto}}" class="js-block">
                    </input>
                    @endforeach
                    @endif
                </div>
                <div class="text-center mt-3">
                    <button class="cta" type="submit">Publicar</button>
                </div>
            </form>
            </div>
        </section>


        <script src="{{ URL::to('js/noticias_escribir.js') }}">
        </script>
@endsection
