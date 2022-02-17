@extends('layouts.app')

@section('title')
    Entrenadores
@endsection





@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/entrenadores.js') }}"></script>

    <div class="row">
        @php
            $a = 1;
        @endphp

        @if ($a == 1)
            @for ($i = 0; $i < 1; $i++)
                <div class="col s6 m4 l3">
                    <div class="card" style="width: 13rem; height: 25rem;">

                        <div style="text-align: center; padding: 10rem 0;">
                            <a class="btn-large halfway-fab waves-effect waves-light green addEnt"
                                href="{{ url('/entrenadores/create') }}"><i class="material-icons">add</i></a>
                        </div>

                    </div>

                </div>
            @endfor
        @endif
        <form>
            {{ @csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            @foreach ($entrenadores as $e)
                <div class="col s6 m4 l3" id="cardItem" data-target="{{ $e->id }}">
                    <div class="card" style="width: 13rem; height: 25rem;">
                        <div class="card-image">
                            <div class="center-align">
                                {{--  /* <form id="formEditEnt" method="POST" action="{{ url('entrenadores/editView') }}">

                                    <input id="id_ent" type="hidden" value="{{ $e->id }}">

                                    <a class="btn-small halfway-fab waves-effect waves-light yellow editEnt"
                                        data-target="{{ $e->id }}"><i class="material-icons">edit</i></a>
                                </form> */  --}}


                                <a class="btn-small halfway-fab waves-effect waves-light red deleteEnt"
                                    data-target="{{ $e->id }}"><i class="material-icons">delete</i></a>
                            </div>

                            <img src="{{ asset('img/avatar.png') }}">
                            <span class="card-title green-text" style="width: 80%;"> {{ $e->nombre }} </span>
                            <div class="center-align">
                                <small>{{ $e->rol }}</small>
                            </div>
                        </div>
                        <div class="module card-content">
                            <p> {{ $e->comentario }}.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
    </div>




    <script>
        $(".deleteEnt").on('click', function() {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: "{{ asset('/entrenadores/delete') }}",
                data: {
                    id: $(this).data('target')
                },
                success: function(result) {
                    M.toast({
                        html: 'Entrenador borrado'
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });



        $(".editEnt").on('click',function() {
            console.log("llgaste");

            var c = $(this).data('target');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ asset('/entrenadores/editView')}}",
                data: {
                    id_ent: c
                },
                success: function(result) {
                    console.log(result);


                },
                error: function(e) {
                    console.log(e);
                }
            });
        });

    </script>








@endsection
