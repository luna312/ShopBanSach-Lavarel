
<!DOCTYPE html> 
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 

<script src="{{asset('public/backend/js/jquery-3.5.0.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="{{url('public/ckeditor/ckeditor.js')}}"></script>






</head>
<body>
<section id="container">

<header class="header fixed-top clearfix">

<div class="brand">
    <a href="" class="logo">
        Admin
    </a>

</div>

 

<div class="top-nav clearfix">
    
    <ul class="nav pull-right top-menu">

        
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                
                <span class="username">Xin chào:
                    <?php
                    $name = Session::get('admin_name');
                    if($name){
                        echo $name;
                       
                    }
                    ?>

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        
       
    </ul>
    
</div>
</header>
<?php
$admin_role=Session::get('admin_role');
if($admin_role==1){ 
?>
<aside>
    <div id="sidebar" class="nav-collapse">
        
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm </a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục san phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm </a></li>
                        <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm </a></li>
                        <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu san phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-order')}}">Quản lý đơn hàng </a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/check-post')}}">
                        <i class="fa fa-book"></i>
                        <span>Duyệt bài viết</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bình luận</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-comment')}}">Bình luận sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-comment-post')}}">Bình luận bài viết</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Tài khoản</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="">Admin</a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-admin')}}"> &nbsp; &nbsp;Thêm tài khoản </a></li>
                                <li><a href="{{URL::to('/all-admin')}}"> &nbsp; &nbsp;Liệt kê tài khoản </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{URL::to('/all-order')}}">Customer </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-customer')}}"> &nbsp; &nbsp;Thêm tài khoản </a></li>
                                <li><a href="{{URL::to('/all-customer')}}"> &nbsp; &nbsp;Liệt kê tài khoản </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>            
        </div>
    </div>
</aside>
<?php
}else{
?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm </a></li>
                        <li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục san phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm </a></li>
                        <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm </a></li>
                        <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu san phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-order')}}">Quản lý đơn hàng </a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/check-post')}}">
                        <i class="fa fa-book"></i>
                        <span>Duyệt bài viết</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bình luận</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-comment')}}">Tất cả bình luận </a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Tài khoản</span>
                    </a>
                    <ul class="sub">
          

                        <li>
                            <a href="{{URL::to('/all-order')}}">Customer </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-customer')}}"> &nbsp; &nbsp;Thêm tài khoản </a></li>
                                <li><a href="{{URL::to('/all-customer')}}"> &nbsp; &nbsp;Liệt kê tài khoản </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>            
        </div>
    </div>
</aside>
<?php
}
?>

<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
</section>

		  <div class="footer">

		  </div>
</section>
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="js/jquery.scrollTo.js"></script>


    <script>
        CKEDITOR.replace( 'ckeditor1', {
        
  
        
        filebrowserImageUploadUrl: "{{ url('upload-ckeditor?_token='.csrf_token()) }}",
        filebrowserBrowseUrl     : "{{ url('file-browser?_token='.csrf_token()) }}",
      
        filebrowserUploadMethod: 'form'
    } );
        CKEDITOR.replace( 'ckeditor2', {
        
  
        
        filebrowserImageUploadUrl: "{{ url('upload-ckeditor?_token='.csrf_token()) }}",
        filebrowserBrowseUrl     : "{{ url('file-browser?_token='.csrf_token()) }}",
      
        filebrowserUploadMethod: 'form'
    } );
        
    </script>
   
</body>

</html>
