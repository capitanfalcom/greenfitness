@extends('layouts.app')

@section('title')
    Entrenadores - ADD
@endsection





@section('content')
    <div class="row" style="margin-top: 1rem">
        <h3>Agregar Entrenadores</h3>
        <form class="col s12">
            {{ @csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="nombre_entrenador" data-target="{{ $id_entrenador }}" type="text" class="validate">
                    <label for="nombre_entrenador">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="rol_entrenador" type="text" class="validate">
                    <label for="rol_entrenador">Rol</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <textarea id="comentario_entrenador" class="materialize-textarea"></textarea>
                    <label for="comentario_entrenador">Comentario</label>
                </div>
                <div class="input-field col s6">
                    <input id="seccion_entrenador" type="text" class="validate">
                    <label for="seccion_entrenador">Seccion</label>
                </div>
            </div>

            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input id="img_ent" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <a class="waves-effect waves-light btn" id="btnActualizar">Actualizar</a>


        </form>
    </div>


    <script>
        $('#btnActualizar').on('click', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ asset('/entrenadores/edit') }}",
                data: {
                   ne: $('#nombre_entrenador').val(),
                   re: $('#rol_entrenador').val(),
                   ce: $('#comentario_entrenador').val(),
                   se: $('#seccion_entrenador').val(),
                   ie: $('#img_ent').val()
                },
                /* dataType: "dataType", */
                success: function (data) {
                    M.toast({
                        html: 'Entrenador Actualizado'
                    });
                    setTimeout(function() {
                        window.location.href = "/entrenadores";
                    }, 300);

                },
                error: function (e) {
                    alert(e);
                    console.log(e);

                }
            });
        });

    </script>
@endsection
