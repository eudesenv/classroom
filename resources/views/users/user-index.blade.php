@extends(layout())

@section('content')
<div class="container">
    <h3>Listagem de Usuários</h3>
    <br/><br/>
    <a class="btn btn-default" href="{{ route('users.create') }}">Criar novo</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Perfil</th>
            <th>Dt. Criação</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->cpf_formatted }}</td>
                <td>{{ $roles[$user->role] }}</td>
                <td>{{ $user->created_at_formatted }}</td>
                <td>
                    <a href="{{route('users.edit',['client' => $user->id])}}">Editar</a> |
                    <a href="{{route('users.show',['client' => $user->id])}}">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
</div>
@endsection