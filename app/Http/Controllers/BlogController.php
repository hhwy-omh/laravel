<?php
/**
 * Created by PhpStorm.
 * User: 26456
 * Date: 2018/10/30
 * Time: 9:06
 */
namespace App\Http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller{

    public function index(){
        $data = DB::select("SELECT id,privilege,privilege_url FROM sns_privilege WHERE sub_privilege=0");
        $su = DB::select("SELECT id,privilege,sub_privilege,privilege_url FROM sns_privilege WHERE sub_privilege!=0");
        return view("index",['data'=>$data,'su'=>$su]);
    }
    public function home(){
        return view("home");
    }

    public function advertising(){
      $this->rbac_admin();
        return view("advertising");
    }
    public function Sort_ads(){
      $this->rbac_admin();
        return view("Sort_ads");
    }
    public function transaction(){
      $this->rbac_admin();
        return view("transaction");
    }
    public function Order_Chart(){
      $this->rbac_admin();
        return view("Order_Chart");
    }
    public function Orderform(){
      $this->rbac_admin();
        return view("Orderform");
    }
    public function Amounts(){
      $this->rbac_admin();
        return view("Amounts");
    }
    public function Order_handling(){
      $this->rbac_admin();
        return view("Order_handling");
    }
    public function Refund(){
      $this->rbac_admin();
        return view("Refund");
    }
    public function Cover_management(){
      $this->rbac_admin();
        return view("Cover_management");
    }
    public function payment_method(){
      $this->rbac_admin();
        return view("payment_method");
    }
    public function Payment_Configure(){
      $this->rbac_admin();
        return view("Payment_Configure");
    }
    public function user_list(){
      $this->rbac_admin();
        return view("user_list");
    }
    public function member_Grading(){
      $this->rbac_admin();
        return view("member-Grading");
    }
    public function integration(){
      $this->rbac_admin();
        return view("integration");
    }
    public function Shop_list(){
      $this->rbac_admin();
        return view("Shop_list");
    }
    public function Shops_Audit(){
      $this->rbac_admin();
        return view("Shops_Audit");
    }
    public function Guestbook(){
      $this->rbac_admin();
        return view("Guestbook");
    }
    public function Feedback(){
      $this->rbac_admin();
        return view("Feedback");
    }
    public function article_list(){
      $this->rbac_admin();
        return view("article_list");
    }
    public function article_Sort(){
      $this->rbac_admin();
        return view("article_Sort");
    }
    public function Systems(){
      $this->rbac_admin();
        return view("Systems");
    }
    public function System_section(){
      $this->rbac_admin();
        return view("System_section");
    }
    public function System_Logs(){
      $this->rbac_admin();
        return view("System_Logs");
    }
    public function article_add(){
      $this->rbac_admin();
        return view("article-add");
    }

}
?>
