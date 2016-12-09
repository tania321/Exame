@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info panel-heading">{{ Session::get('message') }}</div>
            @endif

                <form class="form-control jumbotron" action="{{ route('curso.store')  }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="descricao">Designacao</label>
                        <input type="text" id="descricao" name="descricao" class="form-group form-control">
                        <input type="submit" class="btn btn-success btn-group-justified" value="Enviar">
                    </div>
            </form>

        </div>
    </div>

@endsection