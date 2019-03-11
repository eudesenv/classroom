{{csrf_field()}}
<div class="row">
    <div class="col-md-8">   
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" name="name" value="{{old('name',$user->name)}}">
        </div>
    </div>
    <div class="col-md-6">   
            <div class="form-group">
                <label for="name">E-mail</label>
                <input class="form-control" id="email" name="email" value="{{old('email',$user->email)}}">
            </div>
        </div>
    <div class="col-md-6">
        <div class="form-group">
            @php
                $role = $user->role;
            @endphp
            <label for="role">Perfil</label>
            <select class="form-control" name="role" id="role" value="{{$role}}">
                <option value="">Selecione o Perfil</option>
                <option value="2" {{old('role',$role) == 2 ?'selected="selected"': ''}}>Administrador</option>
                <option value="1" {{old('role',$role) == 1 ?'selected="selected"': ''}}>Usuário Comum</option>
            </select>
        </div>
    </div>
</div><br/>