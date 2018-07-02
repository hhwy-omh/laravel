<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegistRequest;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Cache;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;


class RegistController extends Controller
{
    //

    public function regist(){

        return view('regist');
    }
    public function doregist(RegistRequest $req){

        $password = Hash::make($req->password);
        $user = new User;
        $user->mobile = $req->mobile;
        $user->password = $password;

        if($req->has('face') && $req->face->isValid())
        {
            $date = date('Ymd');
            $face = $req->face->store('face/'.$date);
            $user->face = $face;
        }
        else
        {
            return back()->withErrors([
                'face' => '上传过程中出错，请重试！',
            ]);
        }
        $user->save();
        return redirect()->route('login');
    }
}
