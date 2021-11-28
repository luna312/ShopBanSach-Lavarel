<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
   public function save_cart(Request $request){
   	$productID = $request->product_id_hidden;
   	$quantity = $request->quantity;
   
   	$pro_info = DB::table('tbl_product')->where('product_id',$productID)->first();
   	//Cart::add('293ad', 'Product 1', 1, 9.99, 550);
   	//Cart::destroy();
   	// echo'<pre>';
   	// print_r($data);
   	// echo'</pre>';
   	$data['id'] = $pro_info->product_id;
   	$data['qty'] = $quantity;
   	$data['name'] = $pro_info->product_name;
   	$data['price'] = $pro_info->product_price;
   	$data['weight'] = $pro_info->product_price;
   	$data['options']['image']=$pro_info->product_image;
   	Cart::add($data);
      Cart::setGlobalTax(10);
      $cart_count=Cart::count();
     
      Session::put('cart_count',$cart_count);
   	return Redirect::to('/show-cart');
   	
   }
   public function show_cart(){

   	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
		$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

   	return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
   }
   public function delete_choose_cart($rowId){
      Cart::update($rowId,0);
      $cart_count=Cart::count();
      Session::put('cart_count',$cart_count);
      return Redirect::to('/show-cart');

   }
   public function update_quantity_cart(Request $request){
      $rowId = $request ->rowId_pro_cart;
      $qty = $request ->quantity_pro_cart;
      Cart::update($rowId,$qty); 
            $cart_count=Cart::count();
     
      Session::put('cart_count',$cart_count);
      return Redirect::to('/show-cart');
   }
}