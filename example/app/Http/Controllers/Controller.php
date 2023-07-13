<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $allusers = User::all();
        return view('index' , ['allusers' => $allusers]  );

    }
    public function show(Request $request)
    {
        $id = $request -> id;
        $user = User::find($id);
        return view('showuser' , ['user' => $user]);
    }
    public function store(Request $request)
    {
        $name = $request -> name;
        $email = $request -> email;
        $password = $request -> password;
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        return redirect()->route('home');
    }
    public function delete(Request $request)
    {
        $email = $request -> email;
        $user = User::where('email' , $email)->first();

        if($user){
            $user -> delete();
        }
        return redirect()->route('home');
    }
}


