@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <a href="{{ route('curso.create') }}">Forum de Discusao</a>
            <table>
                <thead class="panel-heading">
                <tr>
                    <td>ID</td>
                    <td>Topicos Activos e Nao Activos</td>
                    <td>User Id</td>
                    <td>Accoes</td>
                </tr>
                </thead>

                <tbody class="panel-body">
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->descricao }}</td>
                        <td>{{ $curso->user_id }}</td>
                        <td>
                            <a class="btn btn-small btn-success" href="{{ route('curso.show',['id'=>$curso->id]) }}">Ver</a>
                            <a class="btn btn-small btn-primary" href="{{ route('curso.edit',['id'=>$curso->id]) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

@endsection