@extends('layouts.app')

@section('title')
    Entrenadores
@endsection





@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/entrenadores.js') }}"></script>






    <ul class="collapsible popout">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Empty</div>
            <div class="collapsible-body">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="titulo_seccion" type="text" class="validate">
                            <label for="titulo_seccion">Titulo Seccion</label>
                        </div>
                    </div>

                    <a class="material-icons modal-trigger" href="#modal1">add_circle_outline</a>
                    {{-- <a class="chip">
                        <img src="{{ asset('img/avatar.png') }}" alt="Contact Person">
                        <i> Alexandra </i>
                        <i class="material-icons">delete_forever</i>
                    </a> --}}
                    <div class="row">
                        <div class="col">

                            <input type="text" class="datepicker">
                        </div>
                        <div class="col">
                            <input type="text" class="datepicker">

                        </div>
                    </div>
                    <button class="btn waves-effect waves-light">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </li>
        @foreach ($secciones as $s)
            <li>
                <div class="collapsible-header"><i class="material-icons">place</i>{{ $s->titulo }}</div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col">
                            <label>{{ $s->contenido }}</label>
                        </div>
                        <div class="col">
                            <label>{{ $s->fecha_inicio }}</label>
                            <label>{{ $s->fecha_termino }}</label>
                        </div>
                    </div>

                </div>
            </li>
        @endforeach

    </ul>




    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Seleccion los Entrenadores</h4>
            <ul class="collection">
                @foreach ($entrenadores as $item)
                    <li class="collection-item">
                        <p>
                            <label>
                                <input data-target="{{ $item->id }}" class="entrenadorCheck" type="checkbox" />
                                <span> {{ $item->nombre }}</span>
                            </label>
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Seleccionar</a>
        </div>
    </div>







    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems);
        });

        $('#btnGuardar').on('click', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ asset('/seccion/create') }}",
                data: {
                    ne: $('#nombre_entrenador').val(),
                    re: $('#rol_entrenador').val(),
                    ce: $('#comentario_entrenador').val(),
                    /* se: $('#seccion_entrenador').val(),*/
                    ie: $('#img_ent').val()
                },
                /* dataType: "dataType", */
                success: function(data) {
                    M.toast({
                        html: 'Entrenador Guardado'
                    });
                    setTimeout(function() {
                        window.location.href = "/entrenadores";
                    }, 300);

                },
                error: function(e) {
                    M.toast({
                        html: e
                    });

                }
            });
        });
    </script>
@endsection
