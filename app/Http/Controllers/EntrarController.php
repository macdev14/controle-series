<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntrarRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EntrarController extends Controller
{
    //
    public function index(Request $request){
        return view ('entrar.index');
    }

    public function entrar(EntrarRequest $request){
        
        $login = Auth::attempt($request->only(['email', 'password'] ));

        if (!Auth::attempt($request->only(['email', 'password'] ))) {
            Session::flash('message', 'Usuário e/ou senha incorreta');
            
            return redirect()->back();
        }
        
        return redirect()->route('series.listar');
    }

}
