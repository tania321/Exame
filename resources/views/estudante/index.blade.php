@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <a href="{{ route('curso.create') }}">Novo curso</a>
            <table>
                <thead class="panel-heading">
                <tr>
                    <td>ID</td>
                    <td>Apelido</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Sexo</td>
                    <td>Altura</td>
                    <td>Telefone</td>
                </tr>
                </thead>

                <tbody class="panel-body">
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->descricao }}</td>
                        <td>{{ $curso->user_id }}</td>
                        <td>
                            <a class="btn btn-small btn-success" href="{{ url('curso/'.$curso->id) }}">Ver</a>
                            <a class="btn btn-small btn-success" href="{{ route('curso/'.$curso->id.'/edit') }}">Apagar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

@endsection