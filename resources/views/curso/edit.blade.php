@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info panel-heading">{{ Session::get('message') }}</div>
            @endif

            <form class="form-control panel-body" action="{{route('curso.store')}}">
                <div class="form-group">
                    <label for="descricao">Designacao</label>
                    <input type="text" id="descricao" name="descricao" value="{{ $curso->descricao }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-group-justified">
                </div>
            </form>

        </div>
    </div>

@endsection