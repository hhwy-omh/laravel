<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function rbac_admin(){
        if(session('id')) {
            $id = session('id');
            $use = DB::table('users')->where('id', $id)->first();
            if($use->id_root == 1){
            }else{
                $user = DB::select("SELECT group_concat(e.privilege_url) url FROM sns_users AS a LEFT JOIN sns_user_role AS b ON a.id = b.user_id LEFT JOIN sns_role AS c ON b.role_id = c.id LEFT JOIN sns_role_privilege AS d ON d.role_id = c.id LEFT JOIN sns_privilege AS e ON e.id = d.privilege_id WHERE a.id = $id");
                $path_info = substr($_SERVER['PATH_INFO'], 1);
                if (strpos($user[0]->url, $path_info) !== false) {
                } else {
                    echo "没有权限";
                    exit;
                }
            }
        }else{
            echo "<script>window.parent.location.href='login';</script>";
            exit;
        }
    }
}
