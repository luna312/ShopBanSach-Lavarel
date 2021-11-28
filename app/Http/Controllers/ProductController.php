<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class ProductController extends Controller
{
     public function insert_rating(Request $request){


        $data = array();
         $data['product_id']= $request->product_id;
         $data['rating']= $request->index;
        DB::table('tbl_rating')->insert($data);
        echo 'done';


        
    }
    public function send_comment(Request $request){


        $data = array();
        $data['comment'] = $request ->comment_content;
        $data['comment_name'] = $request ->comment_name;
        $data['product_id'] = $request ->product_id;
        DB::table('tbl_comment')->insert($data);

        
    }
    public function list_comment(){
        $comment = DB::table('tbl_comment')
        ->join('tbl_product','tbl_product.product_id','=','tbl_comment.product_id')
        ->orderby('comment_id','desc')
        ->paginate(10);
        return view('admin.all_comment')->with('comment',$comment);
    }
    public function list_comment_post(){
        $comment_post = DB::table('tbl_comment_post')
        ->join('tbl_post','tbl_post.post_id','=','tbl_comment_post.post_id')
        ->orderby('comment_post_id','desc')
        ->paginate(10);
        return view('admin.all_comment_post')->with('comment_post',$comment_post);
    }
    public function delete_comment($comment_id){
        DB::table('tbl_comment')->where('comment_id',$comment_id)->delete();
        Session::put('message','Xóa bình luận thành công');
        return Redirect::to('all-comment');
        
    }
    public function delete_comment_post($comment_post_id){
        DB::table('tbl_comment_post')->where('comment_post_id',$comment_post_id)->delete();
        Session::put('message','Xóa bình luận thành công');
        return Redirect::to('all-comment-post');
        
    }
    public function load_comment(Request $request){
        $product_id= $request ->product_id;
        $comment = DB::table('tbl_comment')
        
        ->where('product_id',$product_id)->get();
        //$customer= DB::table('tbl_customer')->where('customer_id',[Session::get('customer_id')])->get();

        foreach($comment as $key => $comm ){
            
           $output='
                    <div class="row style-comment">
                        <div class="col-md-2">
                            
                            <img src="'.url('/public/fontend/images/person.png').'" height= "70" width="70px" border-radius="50%" class="comment-pic" style="color: #DDDDDD;">
                            
                        </div>
                        <div class="col-md-10">
                            <p class="content-name-comment">@'.$comm->comment_name.'</p>
                            <p class="date-comment">'.$comm->comment_date.'</p>
                            <p class="content-comment">'.nl2br($comm->comment).'</p>
                        </div>
                    </div>

 
           ';
          echo $output;
        }
         
    }
    // Function cua Admin  v{{URL::to('public/upload/customer/'.$customer->customer_image)}}
	public function add_product(){
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product(){
    	$all_product= DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    	->orderby('tbl_product.product_id','desc')
    	->paginate(8);
    	$manager_product = view ('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request){
    	$data = array();
    	$data['product_name'] = $request ->product_name;
    	$data['product_price'] = $request ->product_price;
    	$data['product_desc'] = $request ->product_desc;
    	$data['product_content'] = $request ->product_content;
    	$data['category_id'] = $request ->product_cate;
    	$data['brand_id'] = $request ->product_brand;
    	$data['product_status'] = $request ->product_status;
        $data['product_quantity'] = $request ->product_quantity;
    	$get_image =$request -> file('product_image');
    	if($get_image){
    		$get_name_image =$get_image->getClientOriginalName();
    		$name_image= current(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product',$new_image);
    		$data['product_image'] = $new_image;
            $get_image_second =$request -> file('product_image_second');
             if($get_image_second){
                $get_name_image_second =$get_image_second->getClientOriginalName();
                $name_image_second= current(explode('.', $get_name_image_second));
                $new_image_second = $name_image_second.rand(0,99).'.'.$get_image_second->getClientOriginalExtension();
                $get_image_second->move('public/upload/product',$new_image_second);
                $data['product_image_second'] = $new_image_second;
                DB::table('tbl_product')->insert($data);
                Session::put('message','Thêm sản phẩm thành công');
                return Redirect::to('add-product');
            }else{
            Session::put('message','Chưa chọn ảnh thêm sản phẩm thất bại');
            return Redirect::to('all-product');
            }
    	}else{
    	Session::put('message','Chưa chọn ảnh thêm sản phẩm thất bại');
    	return Redirect::to('all-product');
    	}

    }
    public function unactive_product($product_id){
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	Session::put('message','Không kích hoạt sản phẩm thành công');
    	return Redirect::to('all-product');
    }
     public function active_product($product_id){
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	Session::put('message','Kích hoạt sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function edit_product($product_id){
	    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	$edit_product= DB::table('tbl_product')->where('product_id',$product_id)->get();
    	$manager_product = view ('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    	return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){
    	$data = array();
    	$data['product_name'] = $request ->product_name;
    	$data['product_price'] = $request ->product_price;
    	$data['product_desc'] = $request ->product_desc;
    	$data['product_content'] = $request ->product_content;
    	$data['category_id'] = $request ->product_cate;
    	$data['brand_id'] = $request ->product_brand;
    	$data['product_status'] = $request ->product_status;
        $data['product_quantity'] = $request ->product_quantity;
    	$get_image=	$request->file('product_image');
    	if($get_image){
    		$get_name_image =$get_image->getClientOriginalName();
    		$name_image= current(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product',$new_image);
    		$data['product_image'] = $new_image;
	    
            $get_image_second =$request -> file('product_image_second');
            if($get_image_second){
                $get_name_image_second =$get_image_second->getClientOriginalName();
                $name_image_second= current(explode('.', $get_name_image_second));
                $new_image_second = $name_image_second.rand(0,99).'.'.$get_image_second->getClientOriginalExtension();
                $get_image_second->move('public/upload/product',$new_image_second);
                $data['product_image_second'] = $new_image_second;
                DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                Session::put('message','Cập nhật sản phẩm thành công');
                return Redirect::to('all-product');
            }else{
            Session::put('message','Chưa chọn ảnh thêm sản phẩm thất bại');
            return Redirect::to('all-product');
            }
    	}else{
    	DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    	Session::put('message','Cập nhật sản phẩm thành công (^-^)');
    	return Redirect::to('all-product');
    	}	
    	// DB::table('tbl_product')->where('product_id',$brand_product_id)->update($data);
    	// Session::put('message','CẬp nhật thương hiệu sản phẩm thành công');
    	// return Redirect::to('all-product');
    }
     public function delete_product($product_id){
    	DB::table('tbl_product')->where('product_id',$product_id)->delete();
    	Session::put('message','Xóa sản phẩm thành công');
    	return Redirect::to('all-product');
        
    }
    // Function cua Home
    public function detail_product($product_id){
        // $customer = DB::table('tbl_comment')
        // ->join('tbl_customer','tbl_customer.customer_id','=','tbl_comment.customer_id')
        // ->where('product_id',$product_id)
        // ->limit(1)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $detail_product= DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)
        ->get();

        foreach($detail_product as $key => $value){
           $category_id = $value->category_id;  
        }
           
        
                $related_product= DB::table('tbl_product')
        
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])
        ->limit(3)
        ->get();

        $rating= DB::table('tbl_rating')->where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.product.show_detail')->with('category',$cate_product)->with('brand',$brand_product)->with('detail_product',$detail_product)->with('related_product',$related_product)->with('rating',$rating);


    } 

}
