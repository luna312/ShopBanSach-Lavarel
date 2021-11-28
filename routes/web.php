<?php
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
------
Route::get('/', function () {
    return view('layout');
});
Route::get('/trang-chu', function () {
    return view('layout');
});

*/
//post admin
Route::get('/watch-post/{post_id}','InforController@watch_post');
Route::get('/check-post','InforController@check_post');
Route::get('/unactive-post/{post_id}','InforController@unactive_post');
Route::get('/active-post/{post_id}','InforController@active_post');
Route::get('/delete-post/{post_id}','InforController@delete_post');

//post bai viet
Route::get('/edit-post/{post_id}','InforController@edit_post');
Route::get('/add-post','InforController@add_post');
Route::get('/post-forum','InforController@show_post');
Route::get('/show_posts_account/{customer_id}','InforController@show_post_account');
Route::get('/chi-tiet-bai-viet/{post_id}','InforController@detail_post');
Route::post('/save-post','InforController@save_post');
Route::post('/save_post_edit/{post_id}','InforController@save_post_edit');
//comment va rate post
Route::post('/load-comment-post','InforController@load_comment_post');
Route::post('/send-comment-post','InforController@send_comment_post');


Route::post('/upload-ckeditor','ProductController@ckeditor_image');
Route::get('/file-browser','ProductController@file_browser');

//comment va rate
Route::post('/load-comment','ProductController@load_comment');
Route::post('/send-comment','ProductController@send_comment');
Route::get('/all-comment','ProductController@list_comment');
Route::post('/insert-rating','ProductController@insert_rating');
Route::get('/all-comment-post','ProductController@list_comment_post');
Route::get('/delete-comment/{comment_id}','ProductController@delete_comment');
Route::get('/delete-comment-post/{comment_post_id}','ProductController@delete_comment_post');
//giaodien home
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search_product');
//Danh muc san pham cua trang chu
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@detail_product');


//admin
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');
//admin-layout
Route::get('/all-admin','AdminController@all_admin');
Route::get('/edit-admin/{admin_id}','AdminController@edit_admin');
Route::post('/update-admin/{admin_id}','AdminController@update_admin');
Route::post('/save-admin','AdminController@save_admin');
Route::get('/add-admin','AdminController@add_admin');
//customer
Route::get('/all-customer','AdminController@all_customer');
Route::get('/edit-customer/{customer_id}','AdminController@edit_customer');
Route::post('/update-customer/{customer_id}','AdminController@update_customer');
Route::post('/save-customer','AdminController@save_customer');
Route::get('/add-customer','AdminController@add_customer');
Route::get('/delete-customer/{customer_id}','AdminController@delete_customer');


//Category Produxt
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');


//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');

Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');

Route::post('/update-product/{product_id}','ProductController@update_product');

//Cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-choose-cart/{rowId}','CartController@delete_choose_cart');
Route::post('/update_quantity_cart','CartController@update_quantity_cart');

//Checkout
 Route::get('/login-checkout','CheckoutController@login_checkout');
 Route::get('/logout-checkout','CheckoutController@logout_checkout');
  Route::post('/add-customer','CheckoutController@add_customer');
  Route::post('/order-place','CheckoutController@order_place');
  Route::post('/login-customer','CheckoutController@login_customer');
    Route::get('/checkout','CheckoutController@checkout');
    Route::get('/payment','CheckoutController@payment');
      Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');





//order
       Route::get('/all-order','CheckoutController@all_order');
Route::get('/edit-order/{order_id}','CheckoutController@edit_order');
      Route::get('/delete-order/{order_id}','CheckoutController@delete_order');
      Route::post('/update-order/{order_id}','CheckoutController@update_order');

//information-account//
Route::post('/thong-tin-update/{customer_id}','InforController@update_customer');
Route::get('/information-account/{customer_id}','InforController@show');
Route::get('/information-order/{customer_id}','InforController@show_order_infor');
Route::get('/information-order-detail/{customer_id}','InforController@show_order_detail');
Route::get('/forget-password/{customer_id}','InforController@forget_password');
Route::post('/update-forget-password/{customer_id}','InforController@update_forget_password');
//contact//
Route::get('/show-contact','InforController@show_contact');