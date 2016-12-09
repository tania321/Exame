@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info panel-heading">{{ Session::get('message') }}</div>
            @endif

            <div class="panel-body">
                <div class="jumbotron">
                    <label>Id do Curso</label>:  <p> <strong>{{ $curso->id }}</strong>  </p> <br>
                    <label>Topicos Activos</label>: <p>{{ $curso->descricao }}</p>
                    <label>Comentarios1 Comentario2 Comentario3 Comentario4 Comentario6 Comentario7 Comentario9 Comentario10</label>: <p>{{ $curso->descricao }}</p>
                </div>
            </div>

    </div>
@endsection