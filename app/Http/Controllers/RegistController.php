<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use \Illuminate\Session\Middleware\StartSession;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

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
        $this->emil($data['username'],$data['email'],$data['_token']);
       $time = date("Y-m-d H:i:s");
       DB::table('users')->insert([
           'created_at' => $time,
           'updated_at' => $time,
           'token' => $data['_token'],
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
            if($user->quantity<3){
            if (Hash::check($req->password, $user->password)) {
                if ($user->state == 1) {
                    $ip = $this->get_real_ip();
                    $stmt = $this->getCity($ip);
                    $ip_gsd = $stmt['country'].$stmt['region'].$stmt['city'];
                    DB::table('user_record')->insert([
                        'ip' => $ip,
                        'ip_time' => $time,
                        'address' => $ip_gsd,
                        'user_id' => $user->id,
                    ]);
                    session([
                        'id' => $user->id,
                        'username' => $user->user,
                        'ip' => $ip_gsd,
                        'date' => $time,
                    ]);
                    DB::table('users')->where('id', $user->id)->update(['quantity' => '0']);
                    session()->forget('error_s');
                    return redirect('/');
                } else {
                    session()->flash('error_s', '账户未激活，请登陆邮箱激活！');
                    return redirect('login');
                }
            } else {
                DB::table('users')->where('id', $user->id)->increment('quantity');
                session()->flash('error_s', '密码不正确！');
                return redirect('login');
            }
        }else{
                session()->flash('error_s','密码已输错3次无法再输入');
                return redirect('login');
            }
        } else {
            session()->flash('error_s','用户名或密码不正确！');
            return redirect('login');
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
    function getCity($ip){
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));
        if((string)$ip->code=='1'){
            return false;
        }
        $data = (array)$ip->data;
        return $data;
    }

    public function emil($user,$email,$_token){
        $transport = (new \Swift_SmtpTransport('smtp.163.com', 25))
            ->setUsername('13415018910@163.com')
            ->setPassword('qucan134');
        $mailer = new \Swift_Mailer($transport);
        $message = new \Swift_Message($transport);
        $message->setSubject('账户激活')
            ->setFrom(['13415018910@163.com' => '火山科技有限公司'])
            ->setTo([$email, $email => $user])
            ->setBody("欢迎注册：<br><a href='http://www.hhwyomh.cn/emil_in?name=$user&token=$_token'>点击即可激活您的账户:$_token</a>",'text/html');
            $mailer->send($message);
    }
    public function emil_in()
    {
        $stmt = $_GET;
        $user = $stmt['name'];
        $token = $stmt['token'];
        $use = DB::table('users')->where('user', $user)->where('token', $token)->first();
        if($use){
            DB::table('users')->where('user', $user)->update(['state' => '1']);
            echo "<script> document.write('激活成功，请登陆！');parent.location.href='/login'; </script>";
        }
    }

}
//array(13) {
//    ["ip"]=>
//  string(15) "223.104.147.242"
//    ["country"]=>
//  string(6) "中国"
//    ["area"]=>
//  string(0) ""
//    ["region"]=>
//  string(6) "江苏"
//    ["city"]=>
//  string(6) "宿迁"
//    ["county"]=>
//  string(2) "XX"
//    ["isp"]=>
//  string(6) "移动"
//    ["country_id"]=>
//  string(2) "CN"
//    ["area_id"]=>
//  string(0) ""
//    ["region_id"]=>
//  string(6) "320000"
//    ["city_id"]=>
//  string(6) "321300"
//    ["county_id"]=>
//  string(2) "xx"
//    ["isp_id"]=>
//  string(6) "100025"
//}




























