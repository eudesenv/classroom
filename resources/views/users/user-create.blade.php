@extends(layout())

@section('content')
    <div class="container">
        <h3>Novo usuário</h3>
        @include('form._form_errors')
        <form method="post" action="{{ route('users.store') }}">
            @include('users._form')     
            <button type="submit" class="btn btn-success">Criar</button>   
        </form>
    </div>
@endsection