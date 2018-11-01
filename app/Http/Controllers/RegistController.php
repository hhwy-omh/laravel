<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use \Illuminate\Session\Middleware\StartSession;

class RegistController extends Controller
{
    //
    public function register()
    {
        return view("register");
    }

    public function register_get(Request $req)
    {
        $data = $req->all();
        $time = date("Y-m-d H:i:s");
        DB::table('users')->insert([
            'created_at' => $time,
            'updated_at' => $time,
            'user' => $data['username'],
            'mobile' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'email' => $data['email']
        ]);
        return redirect('login');
    }

    public function register_name()
    {
        $stmt = $_GET;
        $data = DB::table('users')->where('user', $stmt)->first();
        return json_encode($data);
    }

    public function login()
    {
        return view("login");
    }

    public function login_in(Request $req)
    {
        $user = DB::table('users')->where('user', $req->username)->first();
        $time = date("Y-m-d H:i:s");
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $data = $this->get_real_ip();
               DB::table('users')->where('user', $req->username)->update([
                   'ip'=>$data,
                   'updated_at' => $time,
               ]);
               session([
                   'id' => $user->id,
                   'username' => $user->user,
                   'ip' => $data,
                   'date' => $time,
               ]);
               return redirect('/');
            } else {
                echo '用户名或密码不正确';
            }
        } else {
            echo '用户名或密码不正确';
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
    function get_real_ip()

    {

        $ip=FALSE;

        if(!empty($_SERVER["HTTP_CLIENT_IP"])){

            $ip = $_SERVER["HTTP_CLIENT_IP"];

        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);

            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }

            for ($i = 0; $i < count($ips); $i++) {

                if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {

                    $ip = $ips[$i];

                    break;

                }

            }

        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);

    }
}




























