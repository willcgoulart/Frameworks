<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public  function create()
	{
		return view('user.create');
	}

    public function store(UserRequest $request)
	{
        $data = $request->except( ['_token','password_confirmation'] );
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        
        Auth::login($user);
        return redirect()->route('dashboard');      
	}

    public function editar(Request $request)
	{
		return view('user.editar');
	}

	public function editarsave(UserRequest $request)
	{
        $novaName = $request['name'];
        $novaCpf = $request['cpf'];
        $novaUserName = $request['user_name'];
        $novaEmail = $request['email'];
        $novaTipoUser = $request['tipo_user'];
        $novaPassword = Hash::make($request['password']);
		
        $user = User::find( Auth::user()->id_user );

		$user->name = $novaName;
        $user->cpf = $novaCpf;
        $user->user_name = $novaUserName;
        $user->email = $novaEmail;
        $user->tipo_user = $novaTipoUser;
        $user->password = $novaPassword;
		$user->save();

		return redirect()->route('dashboard');
	}

}
