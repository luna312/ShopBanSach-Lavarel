<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class InforController extends Controller
{
	public function show($customer_id){
		$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $show_info= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
        return view('layout_account')->with('show_info', $show_info)->with('category',$cate_product);
    }	
    public function show_order_infor($customer_id){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $all_order= DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->where('tbl_order.customer_id',$customer_id)
        ->orderby('tbl_order.order_id','desc')
        ->paginate(8);
        //$manager_order = view ('layout_account_order')->with('all_order',$all_order);
        return view('layout_account_order')->with('all_order', $all_order)->with('category',$cate_product);
    }	
    public function show_order_detail($order_id){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
         $order_by_id= DB::table('tbl_order')        
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_ship','tbl_order.ship_id','=','tbl_ship.ship_id')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_ship.*','tbl_order_detail.*')
        ->where('tbl_order.order_id',$order_id)->paginate(6);
        // echo '<pre>';
        // print_r($order_by_id);  
        // echo '</pre>' ; 
        $order_by_id_first= DB::table('tbl_order')       
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_ship','tbl_order.ship_id','=','tbl_ship.ship_id')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        
        ->select('tbl_order.*','tbl_customer.*','tbl_ship.*','tbl_order_detail.*')
        ->where('tbl_order.order_id',$order_id)->first();

		$order_detail_id= DB::table('tbl_order_detail')
		->join('tbl_product','tbl_order_detail.product_id','=','tbl_product.product_id')
		->join('tbl_order','tbl_order_detail.order_id','=','tbl_order.order_id')
		->select('tbl_order.*','tbl_product.*','tbl_order_detail.*')
		->where('tbl_order_detail.order_id',$order_id)->first();

         return view('layout_account_order_detail')->with('order_by_id',$order_by_id)->with('order_by_id_first',$order_by_id_first)->with('order_detail_id',$order_detail_id)->with('category',$cate_product);
        // return view('admin.edit_order');
    }

    public function update_customer(Request $request,$customer_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        		$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        //$password= DB::table('tbl_customer')->where('customer_id',$customer_id)->select('tbl_customer.customer_password')->get();
        $data = array();
	 		$data['customer_name'] = $request ->customer_name;
	        $data['customer_email'] = $request ->customer_email;
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
	            return view('layout_account')->with('show_info', $show_info)->with('category',$cate_product)->with('brand',$brand_product);
	        }else{
	        $show_info= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
	        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
	        Session::put('message','Cập nhật tài khoản thành công (^-^)');
	        return view('layout_account')->with('show_info', $show_info)->with('category',$cate_product)->with('brand',$brand_product);
	        }          	
        }
    
    //------Bài viết ---//
    public function show_post_account($customer_id){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $show_posts_account= DB::table('tbl_post')
        ->join('tbl_customer','tbl_post.customer_id','=','tbl_customer.customer_id')
        ->where('tbl_post.customer_id',$customer_id)
        ->paginate(6);

        return view('layout_account_post')->with('show_posts_account', $show_posts_account)->with('category',$cate_product)->with('brand',$brand_product);
    }
	public function show_post(){
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $show_posts= DB::table('tbl_post')
        ->join('tbl_customer','tbl_post.customer_id','=','tbl_customer.customer_id')
        ->where('post_status','1')
        ->paginate(6);

        return view('pages.post.all_post')->with('show_posts', $show_posts)->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function detail_post($post_id){      
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
       	$show_posts= DB::table('tbl_post')
        ->join('tbl_customer','tbl_post.customer_id','=','tbl_customer.customer_id')
        ->where('post_id',$post_id)
        ->get();
         return view('pages.post.show_detail_post')->with('show_posts', $show_posts)->with('category',$cate_product)->with('brand',$brand_product);

    }
    public function send_comment_post(Request $request){


        $data = array();
        $data['comment_post'] = $request ->comment_post_content;
        $data['comment_post_name'] = $request ->comment_post_name;
        $data['post_id'] = $request ->post_id;
        DB::table('tbl_comment_post')->insert($data);

        
    }
    // public function list_comment(){
    //     $comment_post = DB::table('tbl_comment_post')
    //     ->join('tbl_post','tbl_post.post_id','=','tbl_comment_post.post_id')
    //     ->orderby('comment_post_id','desc')
    //     ->paginate(10);
    //     return view('admin.all_comment_post')->with('comment_post',$comment_post);
    // }
    public function load_comment_post(Request $request){
        $post_id= $request ->post_id;
        $comment_post = DB::table('tbl_comment_post')
        
        ->where('post_id',$post_id)->get();
        //$customer= DB::table('tbl_customer')->where('customer_id',[Session::get('customer_id')])->get();

        foreach($comment_post as $key => $comm ){
            
           $output='
                    <div class="row style-comment">
                        <div class="col-md-2">
                            
                            <img src="'.url('/public/fontend/images/person.png').'" height= "70" width="70px" border-radius="50%" class="comment-pic" style="color: #DDDDDD;">
                            
                        </div>
                        <div class="col-md-10">
                            <p class="content-name-comment">@'.$comm->comment_post_name.'</p>
                            <p class="date-comment">'.$comm->comment_post_date.'</p>
                            <p class="content-comment">'.nl2br($comm->comment_post).'</p>
                        </div>
                    </div>
 
           ';
          echo $output;
        }
         
    }
    public function add_post(){
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	return view('pages.post.add_post')->with('category', $cate_product)->with('brand', $brand_product);
    }

   	public function save_post(Request $request){
		$data = array();
		$data['customer_id'] = $request ->customer_id;
    	$data['post_title'] = $request ->post_title;
    	$data['post_desc'] = $request ->post_desc;
    	$data['post_content'] = $request ->post_content;
    	$data['post_meta_desc'] = $request ->post_meta_desc;
    	$data['post_meta_keywords'] = $request ->post_meta_keywords;
    	$data['post_status'] = '0';

    	$get_image =$request -> file('post_image');
    	if($get_image){
    		$get_name_image =$get_image->getClientOriginalName();
    		$name_image= current(explode('.', $get_name_image));
    		//$extension_image= end(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		//$new_image = rand(0,99).'.'.$get_image->;
    		$get_image->move('public/upload/post',$new_image);
    		$data['post_image'] = $new_image;
	    	DB::table('tbl_post')->insert($data);
	    	Session::put('message','Thêm bài viết thành công, nội dung của bạn đang được xác duyệt!!!!!');
	    	return Redirect::to('post-forum');
    	}else{
    	Session::put('message','Chưa chọn ảnh thêm bài viết thất bại');
    	return Redirect::to('add_post');
    	}
    }	
     public function edit_post($post_id){
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
		$show_posts= DB::table('tbl_post')
        ->where('post_id',$post_id)
        ->get();
    	return view('pages.post.edit_post')->with('category', $cate_product)->with('brand', $brand_product)->with('show_posts', $show_posts);
    }	
    public function save_post_edit(Request $request,$post_id){

    	$customer_id=$request ->customer_id;
    	$post_id=$request ->post_id;
		$data = array();
		$data['customer_id'] = $request ->customer_id;
    	$data['post_title'] = $request ->post_title;
    	$data['post_desc'] = $request ->post_desc;
    	$data['post_content'] = $request ->post_content;
    	$data['post_meta_desc'] = $request ->post_meta_desc;
    	$data['post_meta_keywords'] = $request ->post_meta_keywords;
		$data['post_status'] = $request ->post_status;
    	$get_image =$request -> file('post_image');
    	if($get_image){
    		$get_name_image =$get_image->getClientOriginalName();
    		$name_image= current(explode('.', $get_name_image));
    		//$extension_image= end(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		//$new_image = rand(0,99).'.'.$get_image->;
    		$get_image->move('public/upload/post',$new_image);
    		$data['post_image'] = $new_image;
	    	DB::table('tbl_post')->where('post_id',$post_id)->update($data);
	    	
	    	return Redirect::to('post-forum');
    	}else{
    	Session::put('message','Chưa chọn ảnh thêm bài viết thất bại');
    			$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
		$show_posts= DB::table('tbl_post')
        ->where('post_id',$post_id)
        ->get();
			return view('pages.post.edit_post')->with('category', $cate_product)->with('brand', $brand_product)->with('show_posts', $show_posts);
    	}
    }
    /*----post admin-----*/
	public function check_post(){
        $show_posts= DB::table('tbl_post')
        ->paginate(6);

        return view('pages.post.check_post')->with('show_posts', $show_posts);
    }
    public function unactive_post($post_id){
    	DB::table('tbl_post')->where('post_id',$post_id)->update(['post_status'=>1]);
    	Session::put('message','Kích hoạt bài viết thành công');
    	return Redirect::to('check-post');
    }
     public function active_post($post_id){
    	DB::table('tbl_post')->where('post_id',$post_id)->update(['post_status'=>0]);
    	Session::put('message','Gỡ bài viết thành công');
    	return Redirect::to('check-post');
    }
    public function watch_post($post_id){
    	$show_posts= DB::table('tbl_post')
        ->join('tbl_customer','tbl_post.customer_id','=','tbl_customer.customer_id')
        ->where('post_id',$post_id)
        ->get();
         return view('pages.post.watch_post')->with('show_posts', $show_posts);
    }
         public function delete_post($post_id){
    	DB::table('tbl_post')->where('post_id',$post_id)->delete();
    	Session::put('message','Xóa bài viết thành công');
    	return Redirect::to('check-post');
        
    }
    public function forget_password($customer_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $show_password= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
        return view('layout_forget_password')->with('show_password', $show_password)->with('category',$cate_product);
    }   
    public function update_forget_password(Request $request,$customer_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
                $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $password= DB::table('tbl_customer')->where('customer_id',$customer_id)->select('tbl_customer.customer_password')->get();
        $data = array();
        $checkpassArray='[{"customer_password":"'.md5($request ->customer_password_old).'"}]';
        $checkpass=$request ->customer_password_new;
        $checkpassAgain= $request ->customer_password_new_again;
        if( $checkpassArray == $password && $checkpass==$checkpassAgain){
            $data['customer_password'] = md5($request ->customer_password_new);
            DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
            $show_password= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
            Session::put('message','Cập nhật mật khẩu tài khoản thành công (^-^)');
            return view('layout_forget_password')->with('show_password', $show_password)->with('category',$cate_product)->with('brand',$brand_product);   
        }else{
            Session::put('message','Cập nhật mật khẩu tài khoản thất bại hãy kiểm tra lại(^-^)');
            $show_password= DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
            return view('layout_forget_password')->with('show_password', $show_password)->with('category',$cate_product)->with('brand',$brand_product);
        }   
        // echo $password;
        // echo $checkpassArray;
        // echo $checkpass;
        // echo $checkpassAgain;
      }
      public function show_contact(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
 
    return view('pages.contact')->with('category',$cate_product)->with('brand',$brand_product);
      }
}
