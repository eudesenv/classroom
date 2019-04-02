@extends(layout())
@php
    $current_layout = explode('.', layout())[1];
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Dashboard</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">                    
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <h4 class="card-title">Salas de Aula</h4>
                                <p class="card-text">Gestão das Salas de aulas.</p>
                                <a href="#" class="btn btn-primary">Gerenciar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <h4 class="card-title">Turmas/Disciplinas</h4>
                                <p class="card-text">Gestão das turmas/disciplinas.</p>
                                <a href="#" class="btn btn-primary">Gerenciar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                    <h4 class="card-title">Alunos</h4>
                                    <p class="card-text">Gestão de alunos e frequência.</p>
                                    <a href="{{ route("users.index") }}" class="btn btn-primary">Gerenciar</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
