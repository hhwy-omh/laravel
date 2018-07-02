<?php

namespace App\Http\Controllers;
use Hash;
use App\Http\Requests\RegistRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    //
    public function index() {
        return view('password.index');
    }
    public function doindex(RegistRequest $req){

        $password = Hash::make($req->password);
        $user = new User;
        $user->password = $password;
        $user->save();
//        return redirect()->route('login');
    }

}
