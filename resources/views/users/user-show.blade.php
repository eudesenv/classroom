@extends('layouts.app')

@section('content')
    <h3>Ver cliente</h3>
    <a class="btn btn-primary" href="{{ route('users.edit',['client' => $user->id]) }}">Editar</a>
    <a class="btn btn-danger" href="{{ route('users.destroy',['client' => $user->id]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
    <form id="form-delete"style="display: none" action="{{ route('users.destroy',['users' => $user->id]) }}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th scope="row">Data Criação</th>
            <td>{{$user->created_at_formatted}}</td>
        </tr>
        <tr>
            <th scope="row">Perfil</th>
            <td>{{$roles[$user->role]}}</td>
        </tr>
        </tbody>
    </table>
@endsection