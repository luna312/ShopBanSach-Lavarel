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
                                <h2 style="color: #c83548; font-weight: bold;">Thêm bài viết</h2>
                            <div class="new-post">
                                
                                <form role="form" action="{{URL::to('/save-post/')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <?php
                                        $customer_id = Session::get('customer_id');
                                    ?>
                                    <div class="new-content-post" >
                                        <div class="form-group">
                                            <input type="hidden" name="customer_id" class="form-control" value="{{$customer_id}}">
                                        </div>                                      
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" name="post_image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên tóm tắt</label>
                                            <input type="text" name="post_meta_keywords" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung tóm tắt</label>
                                            <input  type="text" name="post_meta_desc" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="new-content-post">
                                        <div class="form-group">
                                            <label>Tựa đề bài viết</label>
                                            <input type="text" name="post_title" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả nội dung</label>
                                            <input  type="text" name="post_desc" class="form-control" >
                                        </div>
               
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea style="margin-left: 30px;width: 90%;" rows="8" class="form-control" name="post_content"  id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="add_post"   class="btn btn-fefault cart" style="margin-left: 350px;margin-bottom: 50px;height: 50px;width: 100px;">
                                            Thêm
                                    </button>
                                </form>
                           
                            

                        </div>
                    
                    </div>
           
            
        
    @endsection
