<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function CheckLogin(){
        $admin_id= session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send(); 
        }
    }   
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->CheckLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('/dashboard');
    	}else{
    		Session::put('message','Mật khẩu hoặc bị sai kìa nhập lại hihi ');
    		return Redirect::to('/admin');
    	}
    	

    }
    public function logout(){
        $this->CheckLogin();
    	    Session::put('admin_name',null);
    		Session::put('admin_id',null);
    		return Redirect::to('/admin');
    }

    /*---AdminLayout----*/
    public function all_admin(){   
        $all_admin= DB::table('tbl_admin')->paginate(10);
        $manager_admin= view ('admin.all_admin')->with('all_admin',$all_admin);
        return view('admin_layout')->with('admin.all_admin', $manager_admin);
        // return view('pages.admin.all_order');
    }
    public function edit_admin($admin_id){
        $edit_admin= DB::table('tbl_admin')->where('admin_id',$admin_id)->get();
        $manager_admin = view ('admin.edit_admin')->with('edit_admin',$edit_admin);
        return view('admin_layout')->with('admin.edit_admin', $manager_admin);
    }
     public function delete_admin($admin_id){
        DB::table('tbl_admin')->where('admin_id',$admin_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-admin');
        
    }
     public function update_admin(Request $request,$admin_id){
        $data = array();
        $data['admin_role'] = $request ->admin_role;
        $data['admin_email'] = $request ->admin_email;
        $data['admin_password'] = md5($request ->admin_password);
        $data['admin_name'] = $request ->admin_name;
        $data['admin_phone'] = $request ->admin_phone;
        
        DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
        Session::put('message','Cập nhật thành công (^-^)');
        return Redirect::to('all-admin');
    }
    public function save_admin(Request $request){
        $data = array();
        $data['admin_role'] = $request ->admin_role;
        $data['admin_email'] = $request ->admin_email;
        $data['admin_password'] = md5($request ->admin_password);
        $data['admin_name'] = $request ->admin_name;
        $data['admin_phone'] = $request ->admin_phone;
        
        DB::table('tbl_admin')->insert($data);
        Session::put('message','Thêm thành công (^-^)');
        return Redirect::to('add-admin');
    }
    public function add_admin(){
        return view('admin.add_admin');
    }
        /*---CustomerLayout----*/
    public function add_customer(){
        return view('admin.add_customer');
    }
     public function all_customer(){   
        $all_customer= DB::table('tbl_customer')->paginate(10);;
        $manager_customer= view ('admin.all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('admin.all_customer', $manager_customer);
        // return view('pages.customer.all_order');
    }
    public function edit_customer($customer_id){
        $edit_customer= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
        $manager_customer = view ('admin.edit_customer')->with('edit_customer',$edit_customer);
        return view('admin_layout')->with('admin.edit_customer', $manager_customer);
    }
     public function delete_customer($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-customer');
        
    }
     public function update_customer(Request $request,$customer_id){
        $password= DB::table('tbl_customer')->where('customer_id',$customer_id)->select('tbl_customer.customer_password')->get();
        $data = array();

        $checkpass='[{"customer_password":"'.$request ->customer_password.'"}]';


        if( $checkpass == $password){
            $data['customer_name'] = $request ->customer_name;
            $data['customer_email'] = $request ->customer_email;
            $data['customer_password'] = $request ->customer_password;
            $data['customer_address'] = $request ->customer_address;
            $data['customer_phone'] = $request ->customer_phone;
            $get_image= $request->file('customer_image');
            if($get_image){
                $get_name_image =$get_image->getClientOriginalName();
                $name_image= current(explode('.', $get_name_image));
                //$extension_image= end(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                //$new_image = rand(0,99).'.'.$get_image->;
                $get_image->move('public/upload/customer',$new_image);
                $data['customer_image'] = $new_image;
                DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
                $show_info= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
                Session::put('message','Cập nhật tài khoản thành công (^-^)');
                return view('layout_account')->with('show_info', $show_info);
            }else{
            $show_info= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
            DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
            Session::put('message','Cập nhật tài khoản thành công (^-^)');
            return Redirect::to('all-customer');
            }           
        }else{
            $data['customer_name'] = $request ->customer_name;
            $data['customer_email'] = $request ->customer_email;
            $data['customer_password'] = md5($request ->customer_password);
            $data['customer_address'] = $request ->customer_address;
            $data['customer_phone'] = $request ->customer_phone;
            $get_image= $request->file('customer_image');
            if($get_image){
                $get_name_image =$get_image->getClientOriginalName();
                $name_image= current(explode('.', $get_name_image));
                //$extension_image= end(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                //$new_image = rand(0,99).'.'.$get_image->;
                $get_image->move('public/upload/customer',$new_image);
                $data['customer_image'] = $new_image;
                DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
                $show_info= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
                Session::put('message','Cập nhật tài khoản thành công (^-^)');
                return view('layout_account')->with('show_info', $show_info);
            }else{
            $show_info= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
            DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
            Session::put('message','Cập nhật tài khoản thành công (^-^)');
            return Redirect::to('all-customer');
            }               
        }
         
    }
    public function save_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request ->customer_name;
        $data['customer_email'] = $request ->customer_email;
        $data['customer_password'] = md5($request ->customer_password);
        $data['customer_address'] = $request ->customer_address;
        $data['customer_phone'] = $request ->customer_phone;

        $get_image =$request -> file('customer_image');
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            //$extension_image= end(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //$new_image = rand(0,99).'.'.$get_image->;
            $get_image->move('public/upload/customer',$new_image);
            $data['customer_image'] = $new_image;
            DB::table('tbl_customer')->insert($data);
            Session::put('message','Thêm tài khoản thành công');
            return Redirect::to('add-customer');
        }else{
        Session::put('message','Chưa chọn ảnh thêm tài khoản thất bại');
        return Redirect::to('all-customer');
        }
    }


}
