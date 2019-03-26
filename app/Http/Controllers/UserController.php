<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = User::ROLES;
        return view('users.user-index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = User::ROLES;
        return view('users.user-create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $this->_validate($request, $user);        
        $user::create(array_merge($request->all(),['password' => bcrypt(123456)]));               
        return redirect()->to('users')->with('success', 'Usuário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = User::ROLES;
        return view('users.user-show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->_validate($request, $user);
        $user->fill($request->all()); 
        $user->save();       
        return redirect()->to('users')->with('success', 'Usuário alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->to('users')->with('success', 'Usuário excluído com sucesso.');
    }

    protected function _validate(Request $request, User $user){
        $roles = implode(',', array_keys(User::ROLES));
        $this->validate($request, [
            'name' => 'required|max:255',
            'cpf' => 'required|numeric|digits:11|unique:users,cpf,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => "required|in:$roles",
        ], ['role.required' => 'O Perfil deve ser informado.']);
    }
}
