@extends('layout')
@section('content')
 
<div class="features_items"><!--features_items-->
            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-arrow" style="text-transform:uppercase;">
                  <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                  </li>
                  <li>
                    <a href="">Bài viết</a>
                  </li>
                </ol>
            </div>
                                                    <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert" style="color:red; font-weight:bold; font-size:18px;">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                ?>  
            <div style="display: flex;flex-direction: row;">

                <h2 class="title" style="font-weight: bold">Bài viết</h2>
                <a 
                <?php
                  $customer_id = Session::get('customer_id');
                  if($customer_id != NULL){
                    ?>
                    href="{{URL::to('/add-post/')}}" style="margin-left:350px;padding-top:25px;font-weight: bold">Nhấn vào đây để sáng tạo nội dung của chính bạn</a>
                    <?php
                  }else{
                    ?>
                    onclick="alert('Vui lòng đăng nhập để sử dụng')" href="{{URL::to('/login-checkout')}}" style="margin-left:350px;padding-top:25px;font-weight: bold">Nhấn vào đây để sáng tạo nội dung của chính bạn</a>
                    <?php
                  }
                  ?>
                  
            </div>
     @foreach($show_posts as $key => $posts)       
            
                    <div class="post-content" style="display: flex;flex-direction: row;">
                        <a href="{{URL::to('/chi-tiet-bai-viet/'.$posts->post_id)}}" >
                            <div class="post-image" >
                                <img src="{{URL::to('public/upload/post/'.$posts->post_image)}}" alt="" class="image" />
                            </div>
                        </a>
                        <div class="post-infor">
                          <p class="post-infor-head">{{$posts->post_meta_keywords}}</p>
                          <h2 class="post-infor-desc">{{$posts->post_meta_desc}}</h2>
                          <div style="display: flex;flex-direction: row;">
                            <p >Được đăng bởi: &nbsp;&nbsp;</p>
                            <p class="post-infor-name">{{$posts->customer_name}} </p>
                          </div>
                          
                          <p><i class="fas fa-clock red-color post-clock"></i> Vào lúc: {{$posts->post_date}} </p>
                        </div>
                    </div>

              
        @endforeach
        <div class="text-center">
            {{ $show_posts->appends(['sort' => 'post_id'])->links() }}
        </div> 

</div>
    @endsection
