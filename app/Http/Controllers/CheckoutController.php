<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function login_checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_customer(Request $request){
    	$data=  array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_address'] = $request->customer_address;
    	$data['customer_password'] = md5($request->customer_password);
    	$data['customer_phone'] = $request->customer_phone;
        
    	$customer_id = DB::table('tbl_customer')->insertGetId($data);
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return Redirect::to('/');
    }
    public function checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	return view('pages.checkout.infor_checkout')->with('category',$cate_product)->with('brand',$brand_product);    
    }
    public function save_checkout_customer(Request $request){
        $ship_data =DB::table('tbl_ship')->where('ship_id',[Session::get('ship_id')])->first();
        if($request->ship_name==NULL){
            Session::put('message','Bạn phải chọn ít nhất một món hàng để đến thanh toán');
            return Redirect::to('/checkout');
        }
        if( $ship_data == NULL){
            $data=  array();
            $data['ship_name'] = $request->ship_name;
            $data['ship_content'] = $request->ship_content;
            $data['ship_address'] = $request->ship_address;
            $data['ship_phone'] = $request->ship_phone;
                $data['ship_email'] = $request->ship_email;
                $data['ship_status'] = '0';

            $ship_id = DB::table('tbl_ship')->insertGetId($data);
            Session::forget($ship_id);
            Session::put('ship_id',$ship_id);
            return Redirect::to('/payment');           
        }else{
            $data=  array();
            $data['ship_name'] = $request->ship_name;
            $data['ship_content'] = $request->ship_content;
            $data['ship_address'] = $request->ship_address;
            $data['ship_phone'] = $request->ship_phone;
                $data['ship_email'] = $request->ship_email;
            $data['ship_status'] = '0';
            $ship_id = DB::table('tbl_ship')->insertGetId($data);
            Session::forget($ship_id);
            Session::put('ship_id',$ship_id);
            return Redirect::to('/payment');          
        }
    }
     public function payment(){
       
    	 $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	 return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);    
    }
    public function logout_checkout(){
		Session::flush();
		return Redirect::to('/login-checkout') ;
    }
    public function login_customer(Request $request){
    	$email_account = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customer')->where('customer_email',$email_account)->where('customer_password',$password)->first();
    	$admin = DB::table('tbl_admin')->where('admin_email',$email_account)->where('admin_password',$password)->first();
        if($result){
             Session::put('customer_name',$result->customer_name);
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/') ;

    	}else if($admin && $admin->admin_role==1){
            Session::put('admin_name',$admin->admin_name);
            Session::put('admin_role',$admin->admin_role);
            Session::put('admin_id',$admin->admin_id);
            Session::put('customer_name',$admin->admin_name);
            Session::put('customer_id',$admin->admin_id);
            return Redirect::to('/dashboard');
        }else if($admin && $admin->admin_role==2){
            Session::put('admin_name',$admin->admin_name);
            Session::put('admin_role',$admin->admin_role);
            Session::put('admin_id',$admin->admin_id);
            Session::put('customer_name',$admin->admin_name);
            Session::put('customer_id',$admin->admin_id);
            return Redirect::to('/dashboard') ;
        }else if($result==NULL){
            Session::put('message','Tên tài khoản hoặc mật khẩu sai kìa');
            return Redirect::to('/login-checkout') ;
        }else if($admin==NULL){
            Session::put('message','Tên tài khoản hoặc mật khẩu sai kìa');
            return Redirect::to('/login-checkout') ;
        }else{
            Session::put('admin_name',$admin->admin_name);
            Session::put('admin_role',$admin->admin_role);
            Session::put('admin_id',$admin->admin_id);
            Session::put('customer_name',$admin->admin_name);
            Session::put('customer_id',$admin->admin_id);
            return Redirect::to('/login-checkout') ;
        }
    	
    }
        public function order_place(Request $request){
            // $content = Cart::content();
            // echo $content;

            // insert payment 
            if(DB::table('tbl_order')->where('ship_id',[Session::get('ship_id')])!=NULL){
                DB::table('tbl_ship')->where('ship_id','=',[Session::get('ship_id')])->update(['ship_status' => 1]);
                DB::table('tbl_ship')->where('ship_status','=','0')->delete();
            }else{
                DB::table('tbl_ship')->where('ship_status','=','0')->delete();
            }
        // $order_by_id= DB::table('tbl_order')
        // ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        // ->join('tbl_ship','tbl_order.ship_id','=','tbl_ship.ship_id')
        // ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        // ->select('tbl_order.*','tbl_customer.*','tbl_ship.*','tbl_order_detail.*')->where('tbl_order.order_id',$order_id)->get()

        // DB::table('tbl_ship')->whereNotIn('ship_id',[Session::get('ship_id')])->delete();
        $data=  array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang xử lý đơn hàng';
        $paym_id = DB::table('tbl_payment')->insertGetId($data);
        //insert order
        $order_data=  array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['ship_id'] = Session::get('ship_id');
        $order_data['payment_id'] = $paym_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_date'] = Carbon::now()->format('d-m-Y');
        $order_data['order_status'] = 'Đang xử lý đơn hàng';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

//insert order_detail
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data=  array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] =$v_content->name;
            $order_d_data['product_price'] = $v_content->price; 
            $order_d_data['product_buy_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insert($order_d_data); 
            //get id product// 
                 $product_get_id= DB::table('tbl_product')  
                ->select('tbl_product.product_quantity')
                ->from('tbl_product')
                ->where('product_id',$v_content->id)
                ->get(); 
                foreach($product_get_id as $qty){  
            //end get id product//
            $dataPro = array();
            $dataPro['product_quantity'] = $qty->product_quantity- $v_content->qty;
            DB::table('tbl_product')->where('product_id',$v_content->id)->update($dataPro);
             }
        }
        if($data['payment_method']==1){
            echo 'Thanh toán thẻ ATM';

        }elseif ($data['payment_method']==2) {
            Cart::destroy();
         $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
         return view('pages.checkout.direct_payment')->with('category',$cate_product)->with('brand',$brand_product);    
                        //echo 'Tiền mặt';
        }else{
            echo 'Ghi nợ';
        }
        return Redirect::to('/payment');
    }
    public function all_order(){
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // return view('pages.checkout.direct_payment')->with('category',$cate_product)->with('brand',$brand_product);    
        $all_order= DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')
        ->paginate(10);
        $manager_order = view ('admin.all_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.all_order', $manager_order);
        // return view('pages.admin.all_order');
    }
    public function edit_order($order_id){
         $order_by_id= DB::table('tbl_order')
         
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_ship','tbl_order.ship_id','=','tbl_ship.ship_id')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_ship.*','tbl_order_detail.*')->where('tbl_order.order_id',$order_id)->get();
        // echo '<pre>';
        // print_r($order_by_id);  
        // echo '</pre>' ; 
        $order_by_id_first= DB::table('tbl_order')
         
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_ship','tbl_order.ship_id','=','tbl_ship.ship_id')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_ship.*','tbl_order_detail.*')->where('tbl_order.order_id',$order_id)->first();
         $manager_order_by_id = view ('admin.edit_order')->with('order_by_id',$order_by_id)->with('order_by_id_first',$order_by_id_first);
         return view('admin_layout')->with('admin.edit_order', $manager_order_by_id);
        // return view('admin.edit_order');
    }
         public function delete_order($order_id){
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return Redirect::to('all-order');
        
    }
    public function update_order(Request $request,$order_id){
        $data = array();
        $data['order_status'] = $request ->order_status;
        DB::table('tbl_order')->where('order_id',$order_id)->update($data);
        Session::put('message','Cập nhật trình trạng thành công');
        return Redirect::to('all-order');
    }
}
