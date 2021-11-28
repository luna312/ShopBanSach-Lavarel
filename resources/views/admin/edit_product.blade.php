@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <div class="panel-body">
                        		<?php
								$message = Session::get('message');
								if($message){
									echo '<span class="text-alert">',$message,'</span>';
									Session::put('message',null);
								}
								?>
                            <div class="position-center">
                                @foreach($edit_product as $key =>$pro_value)
                            	<form role="form" action="{{URL::to('/update-product/'.$pro_value->product_id)}}" method="post" enctype="multipart/form-data">
                            		{{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro_value->product_name}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro_value->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <br> </br>
                                    <img src="{{URL::to('public/upload/product/'.$pro_value->product_image)}}" height="100" width="90" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm thứ 2</label>
                                    <input type="file" name="product_image_second" class="form-control" id="exampleInputEmail1">
                                    <br> </br>
                                    <img src="{{URL::to('public/upload/product/'.$pro_value->product_image_second)}}" height="100" width="90" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="ckeditor1" >{{$pro_value->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="9" class="form-control" name="product_content" id="ckeditor2">{{$pro_value->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng sản phẩm</label>
                                    <input class="cart_quantity_input" type="number" name="product_quantity" value="{{$pro_value->product_quantity}}" >
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Hiển thị</label>
                                          <select name="product_status" class="form-control input-sm m-bot15">
                                        @if($pro_value->product_status==1)
                                         <option value="1">Hiển Thị</option>
                                        <option value="0">Ẩn</option>
                                        @else
                                        <option value="0">Ẩn</option>
                                         <option value="1">Hiển Thị</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                          <select name="product_cate" class="form-control input-sm m-bot15">
                                            @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro_value->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                      
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Thương hiệu</label>
                                          <select name="product_brand" class="form-control input-sm m-bot15">
                                             @foreach($brand_product as $key => $brand)
                                             @if($brand->brand_id==$pro_value->brand_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endif
                                         @endforeach
                                      
                                    </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                         </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection