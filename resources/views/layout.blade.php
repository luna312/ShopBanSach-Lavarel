<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
   <script type="text/javascript">
       $(document).ready(function(){
            load_comment();

            function load_comment(){
                var product_id = $('.comment_product_id').val();
                var _token =$('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/load-comment')}}",
                    method:"POST",
                    data:{product_id:product_id, _token:_token},
                    success:function(data){
                        
                        $('#comment_show').html(data);
                    }
                });
            }
            $('.send-comment').click(function(){

               
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token =$('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/send-comment')}}",
                    method:"POST",
                    data:{product_id:product_id, comment_name:comment_name, comment_content:comment_content, _token:_token},
                    success:function(data){
                        $('#nortify_comment').html('<p class="text text-success">Thêm bình luận thành công</p> ')
                        load_comment();
                    }
                });

                
            });

       });
   </script> 
      <script type="text/javascript">
       $(document).ready(function(){
            load_comment_post();

            function load_comment_post(){
                var post_id = $('.comment_post_id').val();
                var _token =$('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/load-comment-post')}}",
                    method:"POST",
                    data:{post_id:post_id, _token:_token},
                    success:function(data){
                        
                        $('#comment_post_show').html(data);
                    }
                });
            }
        $('.send-comment-post').click(function(){

               
                var post_id = $('.comment_post_id').val();
                var comment_post_name = $('.comment_post_name').val();
                var comment_post_content = $('.comment_post_content').val();
                var _token =$('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/send-comment-post')}}",
                    method:"POST",
                    data:{post_id:post_id, comment_post_name:comment_post_name, comment_post_content:comment_post_content, _token:_token},
                    success:function(data){
                        $('#nortify_comment').html('<p class="text text-success">Thêm bình luận thành công</p> ')
                        load_comment_post();
                    }
                });

                
            });

       });
   </script> 

   <script type="text/javascript">
       function remove_background(product_id)
       {
            for(var count=1; count <=5; count++){
                $('#'+product_id+'-'+count).css('color','#ccc');
            }
       }
       $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
             var product_id = $(this).data('product_id');
            remove_background(product_id);
            for(var count =1;count<=index; count++){
                $('#'+product_id+'-'+count).css('color','#ffcc00');
            }
        });
       $(document).on('mouseleave','.rating', function(){
        var index = $(this).data("index");
             var product_id = $(this).data('product_id');
             var rating = $(this).data("rating");
            remove_background(product_id);
            for(var count =1;count<=index; count++){
                $('#'+product_id+'-'+count).css('color','#ffcc00');
            }
        });
       $(document).on('click','.rating', function(){
            var index = $(this).data("index");
             var product_id = $(this).data('product_id');
             var _token =$('input[name="_token"]').val();
            
            $.ajax({
                    url:"{{url('insert-rating')}}",
                    method:"POST",
                    data:{index:index, product_id:product_id, _token:_token},
                    success:function(data){
                       if(data == 'done')
                       {
                            alert("Bạn đã đánh giá"+index+" trên 5");
                       }else{
                            alert("Lỗi đánh giá");
                       }
                    }
            });
        });
   </script>

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
                                            <li><a href="{{URL::to('/checkout')}}"><i class="fas fa-money-bill-alt red-color"></i> Thanh toán</a></li>
                                    <?php
                                        }elseif($customer_id!=NULL && $ship_id != NULL){
                                    ?>
                                            <li><a href="{{URL::to('/save-checkout-customer')}}"><i class="fas fa-money-bill-alt red-color"></i> Thanh toán</a></li>    
                                    <?php
                                        }else{

                                    ?>
                                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fas fa-money-bill-alt red-color"></i> Thanh toán</a></li>
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
                                                        <a class="dropdown-item" href="{{URL::to('/logout-checkout')}}">Đăng xuất</a>
                                                        <a class="dropdown-item" href="{{URL::to('/information-account/'.$customer_id)}}">Tài khoản của tôi</a>
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
                        <div class="title-block"><a>Danh mục sản phẩm</a></div>
                        <div id="">
                            @foreach($category as $key => $cate) 
                            <div class="">
                                <div class="title-block-cate">
                                    <h4 class=""><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                
                    <div id="">
                        <div class="title-block"><a>Bộ lọc sản phẩm</a></div>
                        <h3 class="title-content-block" >Thương hiệu</h3>
                        <div class="content-block">
                            <ul>
                                @foreach($brand as $key => $brand)
                                <li>
                                    <a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> {{$brand->brand_name}}</a>
                                </li>
                                 @endforeach
                                
                            </ul>
                        </div>
                        
                    </div>
                 
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                @yield('content')
          
            </div>
        </div>
    </section>
    
    <footer id="footer">

        <div class="footer-center">
            <div class="row"> 
                <div class="col-lg-4">
                    <div class="box-footer-colum">
                        <img src="{{URL::to('/public/fontend/images/TMWShop.png')}}" style="height: 70px; width: 280px;" alt="" />

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
        

        
    </footer>
        <script>
        CKEDITOR.replace( 'ckeditor1', {
            filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
            filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
            filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123", 
            filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files", 
            filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
            filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",            
        // filebrowserImageUploadUrl: "{{ url('upload-ckeditor?_token='.csrf_token()) }}",
        // filebrowserBrowseUrl     : "{{ url('file-browser?_token='.csrf_token()) }}",
      
        // filebrowserUploadMethod: 'form'
    } );
        
    </script>
    @include('ckfinder::setup')

    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
</body>
</html>