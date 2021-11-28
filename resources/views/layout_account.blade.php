<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet"> 
 <script src="{{url('public/ckeditor/ckeditor.js')}}"></script>   

</head>

<body>

    <header id="header">
        <div class="header-middle">
            <div class="col-sm-9">
                <div class= "logo-left">
                    <a href="index.html"><img src="{{URL::to('/public/fontend/images/TMWShop.png')}}" style="height: 70px; width: 280px;" alt="" /></a>
                </div>
                <div class="logo-right">
                    <form action="{{URL::to('/tim-kiem')}}" method="POST">
                        {{csrf_field()}}
                        <div class="search_box">
                            <input type="text" class="index_input_search" name="key_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" class="btn_search_submit" name="search_item" value="Tìm kiếm"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="middle-right">
                    <ul class="nav navbar-nav" style="display: flex; width: 500px;">
                               
                                    <?php
                                        $customer_id = Session::get('customer_id');
                                        $ship_id = Session::get('ship_id');
                                       
                                        if($customer_id!=NULL && $ship_id == NULL)
                                        {
                                    ?>
                                            <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs red-color"></i> Thanh toán</a></li>
                                    <?php
                                        }elseif($customer_id!=NULL && $ship_id != NULL){
                                    ?>
                                            <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs red-color"></i> Thanh toán</a></li>    
                                    <?php
                                        }else{

                                    ?>
                                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs red-color"></i> Thanh toán</a></li>
                                    <?php
                                     }
                                    ?>
                                  
                                    <li class="cart-head">
                                        <div class="layer1">
                                            <a style="  text-decoration: none;" href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart red-color"></i> Giỏ hàng</a>
                                        </div>
                                        <div class="layer2">
                                            <?php
                                                $cart_count = Session::get('cart_count');
                                                if($cart_count){
                                                    echo '<p style=" "  class="text-alert">',$cart_count,'</p>';
                                              
                                                }
                                             ?>
                                        </div>
                                    </li>
                                    <?php
                                        $customer_id = Session::get('customer_id');
                                        if($customer_id!=NULL){
                                    ?>
                                            <li >
                                                <div class="dropdown">
                                                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="margin-left: 10px;height: 60px;border: none;">
                                                  <i class="fa fa-lock red-color"></i> Tài khoản
                                                  </button>
                                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <div  style="display: flex; flex-direction: column;">
                                                        <a class="dropdown-item" href="{{URL::to('/logout-checkout')}}">Đăng Xuất</a>
                                                        <a class="dropdown-item" href="#">Tài khoản của tôi</a>
                                                    </div>
                                                  </div>
                                                </div>
                                            </li>

                                    
                                    <?php
                                    }else{
                                    ?>
                                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock red-color"></i> Đăng Nhập</a></li>
                                    <?php
                                    }
                                    ?>
                    </ul>
                                                                  
                </div>
            </div>
        </div>
    
        <div class="header-bottom">
            <div id="dropdown-menu">
                    <ul >
                        <li><a href="{{URL::to('/trang-chu')}}">Trang Chủ</a></li>
                        <li><a href="#">Sản phẩm</a>
                            <ul class="sub-menu">
                                @foreach($category as $key => $cate) 
                                 <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>  
                                @endforeach
                            </ul>
                        </li> 
                        <li><a href="{{URL::to('/show-cart')}}">Giỏ hàng </a></li>
                        <li><a href="{{URL::to('/post-forum')}}">Diễn Đàn</a></li>
                        <li><a href="{{URL::to('/show-contact')}}">Liên Hệ</a></li>
                    </ul>
            </div>
        </div>
    </header>
    
    <section id="slider">

    </section>
    
    <section> 
        <div class="container">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="">
                        <div class="title-block"><a>Danh mục</a></div>
                        <div id="">
                          
                            <div class="">
                                <div class="title-block-cate">
                                    <h4 class=""><a href="{{URL::to('/information-account/'.$customer_id)}}">Thông tin tài khoản</a></h4>
                                </div>
                            </div>
                            <div class="">
                                <div class="title-block-cate">
                                    <h4 class=""><a href="{{URL::to('/information-order/'.$customer_id)}}">Quản lý hóa đơn</a></h4>
                                </div>
                            </div>
                            <div class="">
                                <div class="title-block-cate">
                                    <h4 class=""><a href="{{URL::to('/show_posts_account/'.$customer_id)}}">Bài viết của bạn</a></h4>
                                </div>
                            </div>
                            <div class="">
                                <div class="title-block-cate">
                                    <h4 class=""><a href="{{URL::to('/forget-password/'.$customer_id)}}">Đổi mật khẩu</a></h4>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            @foreach($show_info as $key =>$customer)
            <form role="form" action="{{URL::to('/thong-tin-update/'.$customer->customer_id)}}" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
            <div class="col-sm-9 padding-right" style="display: flex;flex-direction: column;">
            
          
                <div class="" style="display: flex; height: 320px; width: 100%;">
                    <div class="col-sm-7 padding-left " style=" height: 320px; width: 70%;">
                        <div class= "head-infor">
                            <h2 class="underline">Ảnh đại diện</h2>
                    
                            <img src="{{URL::to('public/upload/customer/'.$customer->customer_image)}}" height= "150" width="150px" border-radius="50%" >
                            <input type="file" name="customer_image" value="Chọn hình" class="form-control" id="exampleInputEmail1" >


                            
                            
                        </div>
                    </div>

                    <div class="col-sm-3 padding-right" style=" height: 300px; width: 30%;">
                        <img style=" border: 1px solid black ;height: 315px; width: 100%;" src="{{URL::to('/public/fontend/images/cute.gif')}}" alt="logo"> 
                    </div>
                </div>
                <div class="head-footer">

                    <h2 class="underline">Thông tin tài khoản</h2>
                    <div class="header-center">
                            <div class="form-group header-content">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_name}}">
                            </div>
                            <div class="form-group header-content">
                                <label for="exampleInputEmail1">Email</label>
                                <input  type="text" name="customer_email" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_email}}">
                            </div>

                            <div class="form-group header-content">
                                <label for="exampleInputEmail1">Địa Chỉ</label>
                                <input  type="text" name="customer_address" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_address}}">
                            </div>
                            <div class="form-group header-content">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" name="customer_phone" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_phone}}">
                            </div>
       

                        
                            <button type="submit" name="add_customer"  onclick=""  class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Cập nhật
                            </button>


                        
                    </div>

                </div>

            </div>
            </form>
          @endforeach


        </div>
    </div>
    </section>
    
    <footer id="footer">

        <div class="footer-center">
            <div class="row"> 
                <div class="col-lg-4">
                    <div class="box-footer-colum">
                        <img src="{{URL::to('/public/fontend/images/TMWShop.png')}}" style="height: 70px; width: 280px;" alt="" alt="logo">

                    </div>
                    <div class="box-footer-colum">
                        <h4 class="">WEBSITE THUỘC QUYỀN</h4>
                        <ul class="footer-list-menu">
                            <li>TMW SHOP</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>                
                </div>
                <div class="col-lg-3">
                    <div class="box-footer-colum">
                        <h4 class="">LIÊN HỆ</h4>
                        <ul class="footer-list-menu">
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i><a>123, khu 2, đường Lê Chí Dân, Tương Bình Hiệp, Thủ Dầu Một, Bình Dương</a>
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i><a> 090 998 28 73</a><br>
                                <a class="ml28"></a>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i><a>worldbook@gmail.com</a>
                            </li>
                        </ul>
                    </div>                      
                </div>
                <div class="col-lg-2">
                    <div class="box-footer-colum">
                        <h4 class="">THÔNG TIN HỖ TRỢ</h4>
                        <ul class="footer-list-menu">
                            <li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i><a href="/pages/lien-he" title="Yêu cầu hỗ trợ">Yêu cầu hỗ trợ</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i><a href="/pages/dieu-khoan-su-dung" title="Điều khoản sử dụng">Điều khoản sử dụng</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i><a href="/pages/chinh-sach-bao-mat" title="Chính sách bảo mật">Chính sách bảo mật</a>
                            </li>
                                
                        </ul>
                    </div>

                </div>
                
                <div class="col-lg-3">
                    
                    <div class="box-footer-colum mb15">
                        <h4 class="">FANPAGE</h4>
                        <div class="social">

                            <ul class="list-unstyled clearfix">
                                
                                <li class="facebook">
                                    <a target="_blank" href="https://www.facebook.com/www.hikaru.com.vn/" class="fa fa-facebook"></a>
                                </li>
                                
                                
                                <li class="twitter">
                                    <a class="fa fa-twitter" target="_blank" href="/"></a>
                                </li>
                                
                                
                                <li class="google-plus">
                                    <a class="fa fa-google-plus" target="_blank" href="/"></a>
                                </li>
                                
                                
                                <li class="rss">
                                    <a class="fa fa-instagram" target="_blank" href="/"></a>
                                </li>
                                
                                
                                <li class="youtube">
                                    <a class="fa fa-youtube" target="_blank" href="/"></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    

                            
                </div>
            </div>
            
        </div>
        
        
        <div class="container-fluid">
           
        </div>
        
    </footer>
    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>


</body>
</html>