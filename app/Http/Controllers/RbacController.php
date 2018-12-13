<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RbacController extends Controller
{
    public function admin_Competence(){
        $this->rbac_admin();
       $data = DB::select("SELECT a.id,a.admin,a.title,GROUP_CONCAT(c.user) e,count(c.user) d FROM sns_role a LEFT JOIN sns_user_role b ON a.id=b.role_id LEFT JOIN sns_users c ON b.user_id=c.id GROUP BY a.id");
       $age = count($data);
       return view("admin_Competence",['data'=>$data,'age'=>$age]);
    }
    public function admin_Competence_i(){
       $age = $_GET['age'];
        DB::table('role')->where('id',$age)->delete();
        DB::table('role_privilege')->where('role_id',$age)->delete();
        DB::table('user_role')->where('role_id',$age)->delete();
       return redirect("admin_Competence");
    }

    public function admin_Competence_in(Request $req){
        $data = $req->except(['_token']);
        $stmt = null;
        foreach($data as $v){
            $stmt .= $v.",";
        }
        $datas = explode(",",$stmt);
        for($i=0;$i<count($datas)-1;$i++){
            DB::table('role')->where('id',$datas[$i])->delete();
            DB::table('role_privilege')->where('role_id',$datas[$i])->delete();
            DB::table('user_role')->where('role_id',$datas[$i])->delete();
        }
        return redirect("admin_Competence");
    }
    public function Competence(){
        $data = DB::table('users')->get();
        $stmt = DB::select("SELECT id,privilege FROM sns_privilege WHERE sub_privilege=0");
        $su = DB::select("SELECT id,privilege,sub_privilege FROM sns_privilege WHERE sub_privilege!=0");
        return view("Competence",['data'=>$data,'stmt'=>$stmt,'su'=>$su]);
    }
    public function Competence_up(){
        $data = DB::table('users')->get();
        $stmt = DB::select("SELECT id,privilege FROM sns_privilege WHERE sub_privilege=0");
        $su = DB::select("SELECT id,privilege,sub_privilege FROM sns_privilege WHERE sub_privilege!=0");
        $age = $_GET['age'];
        $datar = DB::select("SELECT id,user FROM sns_users WHERE sns_users.id NOT IN (( SELECT user_id FROM sns_user_role WHERE role_id = $age ))");
        $datas = DB::select("SELECT a.id, a.admin, a.title, GROUP_CONCAT(distinct c.id ) user_id, GROUP_CONCAT(distinct e.id ) privilege_id FROM sns_role AS a LEFT JOIN sns_user_role AS b ON a.id = b.role_id LEFT JOIN sns_users AS c ON b.user_id = c.id LEFT JOIN sns_role_privilege AS d ON d.role_id = a.id LEFT JOIN sns_privilege AS e ON d.privilege_id = e.id  WHERE a.id = $age  GROUP BY a.id");
        $on = explode(",", $datas[0]->user_id);
        return view("Competence_up",['data'=>$data,'datas'=>$datas,'stmt'=>$stmt,'su'=>$su,'on'=>$on,'datar'=>$datar]);
    }
    public function Competence_update(Request $req){
        $data = $req->all();
        if($data['admin']) {
            DB::table('role')->where('id', $data['id'])->update([
                'admin' => $data['admin'],
                'title' => $data['title'],
            ]);
            DB::table('role_privilege')->where('role_id',$data['id'])->delete();
            DB::table('user_role')->where('role_id',$data['id'])->delete();
            $user = $data['user'];
            for ($i = 0; $i < count($user); $i++) {
                DB::table('user_role')->insertGetId([
                    'role_id' => $data['id'],
                    'user_id' => $user[$i],
                ]);
            }
            $check = $data['check'];
            for ($y = 0; $y < count($check); $y++) {
                DB::table('role_privilege')->insertGetId([
                    'role_id' => $data['id'],
                    'privilege_id' => $check[$y],
                ]);
            }
        }
        return redirect("admin_Competence");
    }
    public function Competence_post(Request $req){
        $data = $req->all();
        if($data['admin']) {
            $age = DB::table('role')->insertGetId([
                'admin' => $data['admin'],
                'title' => $data['title'],
            ]);
            $user = $data['user'];
            for ($i = 0; $i < count($user); $i++) {
                DB::table('user_role')->insertGetId([
                    'role_id' => $age,
                    'user_id' => $user[$i],
                ]);
            }
            $check = $data['check'];
            for ($y = 0; $y < count($check); $y++) {
                DB::table('role_privilege')->insertGetId([
                    'role_id' => $age,
                    'privilege_id' => $check[$y],
                ]);
            }
        }
        return redirect("admin_Competence");
    }

    public function administrator(){
        $this->rbac_admin();
        $where = "1";
        if(isset($_GET['quantity'])){
            $where = "a.id=".$_GET['quantity'];
        }
        if(isset($_GET['user'])){
            $where .= " AND c.user LIKE '%".$_GET['user']."%'";
        }
        if(isset($_GET['date'])){
            $where .= " AND c.created_at LIKE '%".$_GET['date']."%'";
        }
        $user = DB::select("SELECT a.*,count(b.role_id) quantity FROM sns_role AS a LEFT JOIN sns_user_role AS b ON a.id = b.role_id GROUP BY a.id");
        $data = DB::select("SELECT c.*,GROUP_CONCAT( DISTINCT a.admin ) admin FROM sns_role AS a LEFT JOIN sns_user_role AS b ON a.id = b.role_id LEFT JOIN sns_users AS c ON b.user_id =c.id WHERE ".$where." GROUP BY c.id");
        return view("administrator",['data'=>$data,'user'=>$user]);
    }
    public function administrator_update(){
        $id = $_GET['id'];
        $quantity = DB::table('users')->where('id', $id)->get();
        if($quantity[0]->user_off==1){
            DB::table('users')->where('id', $id)->update(['user_off' => '0']);
        }else{
            DB::table('users')->where('id', $id)->update(['user_off' => '1']);
        }
        return redirect('administrator');
    }

    public function administrator_delete(){
        $id = $_GET['id'];
        DB::table('users')->where('id', $id)->delete();
        DB::table('user_role')->where('user_id', $id)->delete();
        return redirect('administrator');
    }

    public function administrator_insert(Request $req){
        $data = $req->all();
        $time = date("Y-m-d H:i:s");
        $quantity = DB::table('users')->insertGetId([
            'created_at' => $time,
            'updated_at' => $time,
            'token' => $data['_token'],
            'user' => $data['username'],
            'mobile' => $data['user-tel'],
            'password' => Hash::make($data['userpassword']),
            'email' => $data['email'],
            'user_image' => 'upload/abc.jpg',
            'id_root' => 2,
            'state' => 1
        ]);
        DB::table('user_role')->insertGetId([
            'user_id' => $quantity,
            'role_id' => $data['admin-role']
        ]);
        return redirect('administrator');
    }

    public function admin_info()
    {
         $this->rbac_admin();
         $id = session('id');
         $user = DB::select("SELECT a.*,group_concat(c.admin) AS admin FROM sns_users AS a LEFT JOIN sns_user_role AS b ON a.id = b.user_id LEFT JOIN sns_role AS c ON b.role_id = c.id WHERE a.id = $id");
         $data = DB::select("SELECT a.id,a.`user`,b.login_off,b.ip,b.ip_time,b.address FROM sns_users AS a ,sns_user_record AS b WHERE a.id = $id AND b.user_id= $id");
         return view("admin_info", ['data' => $data,'user' => $user]);
    }
    public function admin_info_up(Request $req)
    {
            $data = $req->all();
            $id = session('id');
            $stmt = DB::table('users')->where('id', $id)->first();
            if (Hash::check($data['password_s'], $stmt->password)) {
                DB::table('users')->where('id', $id)->update(['password' => Hash::make($data['password'])]);
                session()->flush();
                session()->flash('error_s','密码已重置成功，请重新登录');
                echo "<script>window.parent.location.href='login';</script>";
            }else{
                session()->flash('error_se', '密码不正确！');
           }
    }
    public function admin_info_post(Request $req)
    {
            $data = $req->all();
            if($_FILES["file"]["error"])
            {
                DB::table('users')->where('id', session('id'))->update([
                    'user' => $data['user'],
                    'mobile' => $data['mobile'],
                    'email' => $data['email'],
                ]);
                session()->forget('username');
                session(['username' => $data['user']]);
                return redirect("admin_info");
            }else {
                if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1040000) {
                    $filename ="upload/head_image/".date("Y-m-d")."/".time().session('username').rand(1111,9999).$_FILES["file"]["name"];
                    $filenames ="upload/head_image/".date("Y-m-d")."/";
                    $filenames =iconv("UTF-8","gb2312",$filenames);
                    $filename =iconv("UTF-8","gb2312",$filename);
                    if(file_exists($filenames)) {
                        move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
                        $user_image = DB::table('users')->where('id', session('id'))->first();
                        if($user_image->user_image == "upload/abc.jpg"){
                        }else{
                            unlink($user_image->user_image);
                            DB::table('users')->where('id', session('id'))->update([
                                'user_image' => $filename,
                                'user' => $data['user'],
                                'mobile' => $data['mobile'],
                                'email' => $data['email']
                            ]);
                            session()->forget('username');
                            session()->forget('user_image');
                            session(['user_image' => $filename,'username' => $data['user']]);
                            return redirect("admin_info");
                        }
                    } else {
                        mkdir($filenames, 0700);
                        move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
                        $user_image = DB::table('users')->where('id', session('id'))->first();
                        if($user_image->user_image == "upload/abc.jpg"){
                        }else{
                            unlink($user_image->user_image);
                            DB::table('users')->where('id', session('id'))->update([
                                'user_image' => $filename,
                                'user' => $data['user'],
                                'mobile' => $data['mobile'],
                                'email' => $data['email']
                            ]);
                            session()->forget('username');
                            session()->forget('user_image');
                            session(['user_image' => $filename,'username' => $data['user']]);
                            return redirect("admin_info");
                        }
                    }
                } else {
                    echo"文件类型不对";
                }
            }
    }
}
