@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn-primary btn" href="{{ route('curso.index') }}">Ver Topicos</a>
                    <a class="btn btn-primary" href="{{ route('curso.create') }}">Criar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
