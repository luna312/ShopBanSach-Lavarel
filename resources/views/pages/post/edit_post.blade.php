@extends('layout')
@section('content')

            <div class="col-lg-12">
                   
                        
                            <div class="breadcrumbs">
                                <ol class="breadcrumb breadcrumb-arrow" style="text-transform:uppercase;">
                                  <li>
                                    <a href="{{URL::to('/')}}">Trang chủ</a>
                                    <i class="fa fa-angle-right"></i>
                                  </li>
                                  <li>
                                    <a href="">Bài viết</a>
                                    <i class="fa fa-angle-right"></i>
                                  </li>
                                  <li><a href="">Thêm bài viết</a></li>
                                </ol>
                            </div>

                     
                        
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                ?>
                                <h2 style="color: #c83548; font-weight: bold;">Sửa bài viết</h2>
                            <div class="new-post">
                                @foreach($show_posts as $key =>$post)
                                <form role="form" action="{{URL::to('/save_post_edit/'.$post->post_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <?php
                                        $customer_id = Session::get('customer_id');
                                    ?>
                                    <div class="new-content-post" >
                                        <div class="form-group">
                                            <input type="hidden" name="post_status" class="form-control" value="{{$post->post_status}}">
                                            <input type="hidden" name="customer_id" class="form-control" value="{{$customer_id}}">
                                        </div>                                      
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" name="post_image"  class="form-control" value="{{URL::to('public/upload/post/'.$post->post_image)}}">
                                            <br> </br>
                                            <img style="margin-left: 30px;" src="{{URL::to('public/upload/post/'.$post->post_image)}}" height="100" width="90" >
                                        </div>
                                        <div class="form-group">
                                            <label>Tên tóm tắt</label>
                                            <input type="text" name="post_meta_keywords" class="form-control" value="{{$post->post_meta_keywords}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung tóm tắt</label>
                                            <input  type="text" name="post_meta_desc" class="form-control"  value="{{$post->post_meta_desc}}">
                                        </div>
                                    </div>
                                    <div class="new-content-post">
                                        <div class="form-group">
                                            <label>Tựa đề bài viết</label>
                                            <input type="text" name="post_title" class="form-control" value="{{$post->post_title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả nội dung</label>
                                            <input  type="text" name="post_desc" class="form-control" value="{{$post->post_desc}}">
                                        </div>
               
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea style="margin-left: 30px;width: 90%;" rows="8" class="form-control" name="post_content"  id="ckeditor1" placeholder="Mô tả sản phẩm" >{{$post->post_content}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-fefault cart" style="margin-left: 350px;margin-bottom: 50px;height: 50px;width: 100px;">
                                            Cập Nhật
                                    </button>
                                </form>
                           @endforeach
                            

                        </div>
                    
                    </div>
           
            
        
    @endsection
