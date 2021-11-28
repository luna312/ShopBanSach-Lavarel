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
        <link href="{{asset('public/fontend/css/main3.css')}}" rel="stylesheet">
        <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
        
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
                <div class="col-sm-9 padding-right" style="display: flex;flex-direction: column;">
                    <div class="table-agile-info">
                        <!-- <div class="panel panel-default"> -->
                        <div class= "head-infor" style="height: 500px;margin-bottom: 50px;">
                            <h2 class="underline">Lịch sử mua hàng</h2>
                            
                            <div class="table-responsive">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                echo '<span class="text-alert">',$message,'</span>';
                                Session::put('message',null);
                                }
                                ?>
                                <table class="table" style="margin-top: 20px; margin-left: 20px;width: 780px;">
                                    <thead>
                                        <tr class="order-detail-head">
                                            <th>Tên người đặt</th>
                                            <th>Tổng giá tiền</th>
                                            <th>Ngày đặt</th>
                                            <th>Trình trạng đơn hàng</th>
                                            <th>Hiển thị</th>
                                            <th style="width:30px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_order as $key => $order)
                                        <tr>
                                           
                                            <td>{{($order->customer_name)}}</td>
                                            <td>{{($order->order_total).' '.'VNĐ'}}</td>
                                            <td>{{($order->order_date)}}</td>
                                            <td>{{($order->order_status)}}</td>
                                            <td>
                                                <a href="{{URL::to('/information-order-detail/'.$order->order_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    
                                    <div class="col-sm-5 text-center">
                                        <small class="text-muted inline m-t-sm m-b-sm"></small>
                                    </div>
                                    <div class="col-sm-7 text-right text-center-xs">
                                            <div class="text-center">
                                                {{ $all_order->appends(['sort' => 'order_id'])->links() }}
                                            </div> 
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer">
    <div class="footer-center">
        <div class="row">
            <div class="col-lg-4">
                <div class="box-footer-colum">
                    <img src="{{URL::to('/public/fontend/images/logo.png')}}" alt="logo">
                </div>
                <div class="box-footer-colum">
                    <h4 class="">WEBSITE THUỘC QUYỀN</h4>
                    <ul class="footer-list-menu">
                        <li>HIKARU SHOP</li>
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