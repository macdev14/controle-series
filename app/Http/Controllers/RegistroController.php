<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    //

    public function create(){
        return view('registro.create');
    }

    public function store(RegistroRequest $request){
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($formFields['password']);
        $user = User::create($formFields);
        Auth::login($user);
        return redirect()->route('series.listar');
    } 
}
