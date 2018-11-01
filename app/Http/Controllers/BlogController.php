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

class BlogController extends Controller{
    public function index(){
        return view("index");
    }
    public function home(){
        return view("home");
    }
    public function Products_List(){
        return view("Products_List");
    }
    public function Brand_Manage(){
        return view("Brand_Manage");
    }
    public function Category_Manage(){
        return view("Category_Manage");
    }
    public function advertising(){
        return view("advertising");
    }
    public function Sort_ads(){
        return view("Sort_ads");
    }
    public function transaction(){
        return view("transaction");
    }
    public function Order_Chart(){
        return view("Order_Chart");
    }
    public function Orderform(){
        return view("Orderform");
    }
    public function Amounts(){
        return view("Amounts");
    }
    public function Order_handling(){
        return view("Order_handling");
    }
    public function Refund(){
        return view("Refund");
    }
    public function Cover_management(){
        return view("Cover_management");
    }
    public function payment_method(){
        return view("payment_method");
    }
    public function Payment_Configure(){
        return view("Payment_Configure");
    }
    public function user_list(){
        return view("user_list");
    }
    public function member_Grading(){
        return view("member-Grading");
    }
    public function integration(){
        return view("integration");
    }
    public function Shop_list(){
        return view("Shop_list");
    }
    public function Shops_Audit(){
        return view("Shops_Audit");
    }
    public function Guestbook(){
        return view("Guestbook");
    }
    public function Feedback(){
        return view("Feedback");
    }
    public function article_list(){
        return view("article_list");
    }
    public function article_Sort(){
        return view("article_Sort");
    }
    public function Systems(){
        return view("Systems");
    }
    public function System_section(){
        return view("System_section");
    }
    public function System_Logs(){
        return view("System_Logs");
    }
    public function admin_Competence(){
        return view("admin_Competence");
    }
    public function administrator(){
        return view("administrator");
    }
    public function admin_info(){
        return view("admin_info");
    }
    public function picture_add(){
        return view("picture-add");
    }
    public function article_add(){
        return view("article-add");
    }
    public function product_category_add(){
        return view("product-category-add");
    }

}
?>
