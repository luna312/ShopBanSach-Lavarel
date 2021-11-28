<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{

    public function index(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
		$impress_product= DB::table('tbl_rating')
    	->join('tbl_product','tbl_product.product_id','=','tbl_rating.product_id')
    	->orderby('tbl_rating.rating','desc')
      ->select('tbl_rating.product_id','tbl_product.product_name','tbl_product.product_price','tbl_product.product_desc','tbl_product.product_image','tbl_product.product_image_second')
      ->DISTINCT('tbl_rating.product_id')
      ->limit(6)
    	->get();
		$all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();
    // echo $impress_product;
    return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('impress_product',$impress_product);
    }
    public function search_product(Request $request){
      $key = $request ->key_submit;
      $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    
    $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();
      return view('pages.product.search_product')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }

}
