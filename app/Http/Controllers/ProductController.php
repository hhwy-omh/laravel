<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    //  New Category page(left)
    public function product_category_add(){
        return view("product-category-add");
    }

    //  Category page
    public function Category_Manage(){
        //  R B A C
        $this->rbac_admin();
        $data = DB::table('class')->get();
        return view("Category_Manage",['data'=>$data]);
    }

    //  Delete subclassification
    public function Category_Manage_delete(){
        $id = $_GET['id'];
        DB::table('class')->where('id',$id)->delete();
        //  Refresh parent
        echo "<script>parent.location.reload();</script>";
    }

    //  Modify Category page
    public function Category_Manage_up(){
        $id = $_GET;
        $data = DB::table('class')->where('id',$id)->get();
        return view("product-category-up",['data'=>$data]);
    }

    // Modify Category
    public function Category_Manage_update(){
        $data = $_POST;
        $id = $data['id'];
        DB::table('class')->where('id',$id)->update(['name' => $data['product']]);
        //  Refresh parent
        echo "<script>parent.location.reload();</script>";
    }

    //  New category page
    public function Category_Manage_in(){
        $data = DB::table('class')->where('name_id',0)->get();
        return view("product-category-in",['data'=>$data]);
    }

    //  New category
    public function Category_Manage_insert(Request $req){
        $data = $_POST;
        DB::table('class')->insert([
            'name' => $data['prod_name'],
            'name_id' => $data['id']
        ]);
        //  Refresh parent
        echo "<script>parent.location.reload();</script>";
    }

    //  Three-level linkage
    public function ajax_index_cat(){
        $name = (int)$_GET['id'];
        $data = DB::table('class')->where('name_id',$name)->get();
        echo json_encode($data);
    }

    //  New Brand page
    public function Add_Brand(){
        return view("Add_Brand");
    }

    // New Brand
    public function Add_Brand_insert(Request $req){
        $data = $req->all();
        //  To add a Logo
        $filename ="upload/logo/".time().md5(rand(1111,9999)).$_FILES["file"]["name"];
        $filenames =iconv("UTF-8","gb2312",$filename);
        move_uploaded_file($_FILES["file"]["tmp_name"],$filenames);
        //  The compressed image
        $img = Image::make($filenames)->resize(130, 65);
        $img->save($filenames);
        //  Judgment of nationality
        if($data['mobile'] == '中国'){
            DB::table('brand')->insert([
                'logo' => $filenames,
                'name' => trim($data['user']),
                'state' => trim($data['mobile']),
                'describe' => trim($data['area']),
                'state_on' => 1
            ]);
        }else{
            DB::table('brand')->insert([
                'logo' => $filenames,
                'name' => trim($data['user']),
                'state' => trim($data['mobile']),
                'describe' => trim($data['area']),
                'state_on' => 2
            ]);
        }
        return redirect("Brand_Manage");
    }

    //  Modify the brand page
    public function member_add(){
        $id = $_GET['id'];
        $data = DB::table('brand')->where('id',$id)->get();
        return view("member-add",['data'=>$data]);
    }

    //  Brand page
    public function Brand_Manage(){
        // R B A C
        $this->rbac_admin();
        //  The default all
        $where = "1";
        if(isset($_GET['brand_on'])){
            $where = "brand_on=".$_GET['brand_on'];
        }
        if(isset($_GET['state_o']) && $_GET['state_o']!=""){
            $where .= " AND state_on=".$_GET['state_o'];
        }
        if(isset($_GET['time_o']) && $_GET['time_o']!=""){
            $where .= " AND time LIKE '%".$_GET['time_o']."%'";
        }
        if(isset($_GET['name_o']) && $_GET['name_o']!=""){
            $where .= " AND name LIKE '%".$_GET['name_o']."%'";
        }
        $data = DB::select("SELECT * FROM sns_brand WHERE ".$where);
        $num = DB::table('brand')->where('state_on','1')->count();
        $num2 = DB::table('brand')->where('state_on','2')->count();
        return view("Brand_Manage",['data'=>$data,'num'=>$num,'num2'=>$num2]);
    }

    //  Modify the Brand
    public function Brand_Manage_update(Request $req){
        $data = $req->all();
        //  Determine if the image has been uploaded
        if($data['file']){
            $filename ="upload/logo/".time().md5(rand(1111,9999))."_s".$_FILES["file"]["name"];
            $filenames =iconv("UTF-8","gb2312",$filename);
            move_uploaded_file($_FILES["file"]["tmp_name"],$filenames);
            //  The compressed image
            $img = Image::make($filenames)->resize(130, 65);
            $img->save($filenames);
            //  Delete the original image
            $png = DB::table('brand')->where('id',$data['id'])->first();
            unlink($png->logo);
            //  Judgment of nationality
            if(trim($data['state']) != '中国'){
                DB::table('brand')->where('id',$data['id'])->update([
                    'logo' => $filenames,
                    'name' => trim($data['username']),
                    'state' => trim($data['state']),
                    'describe' => trim($data['title']),
                    'state_on' => 2
                ]);
            }else{
                DB::table('brand')->where('id',$data['id'])->update([
                    'logo' => $filenames,
                    'name' => trim($data['username']),
                    'state' => trim($data['state']),
                    'describe' => trim($data['title']),
                    'state_on' => 1
                ]);
            }
        }else{
            if(trim($data['mobile']) != '中国'){
                DB::table('brand')->where('id',$data['id'])->update([
                    'name' => trim($data['username']),
                    'state' => trim($data['state']),
                    'describe' => trim($data['title']),
                    'state_on' => 2
                ]);
            }else{
                DB::table('brand')->where('id',$data['id'])->update([
                    'name' => trim($data['username']),
                    'state' => trim($data['state']),
                    'describe' => trim($data['title']),
                    'state_on' => 1
                ]);
            }
        }
        //  Refresh parent
        echo "<script>parent.location.reload();</script>";
    }

    //Delete a Brand
    public function Brand_Manage_delete(){
        $id = $_GET['id'];
        DB::table('brand')->where('id',$id)->delete();
    }

    //  Set to deactivate
    public function Brand_Manage_up2(){
        $id = $_GET['id'];
        DB::table('brand')->where('id',$id)->update([
            'brand_on' => 2
        ]);
    }

    //  Set to enable
    public function Brand_Manage_up1(){
        $id = $_GET['id'];
        DB::table('brand')->where('id',$id)->update([
            'brand_on' => 1
        ]);
    }

    //  product page
    public function Products_List(){
        $this->rbac_admin();
        $data = DB::table('class')->get();
        return view("Products_List",['data'=>$data]);
    }

    //
    public function picture_add(){
        return view("picture-add");
    }

    //
    public function picture_add_insert(Request $req){
        dd($req);
    }

    //
    public function Add_Attribute(){
        return view("Attribute");
    }
}




























