@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật tài khoản
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
                                @foreach($edit_customer as $key =>$customer)
                            	<form role="form" action="{{URL::to('/update-customer/'.$customer->customer_id)}}" method="post" enctype="multipart/form-data">
                            		{{ csrf_field() }}

                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input  type="text" name="customer_email" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_email}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="customer_password" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_password}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa Chỉ</label>
                                    <input  type="text" name="customer_address" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_address}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="customer_phone" class="form-control" id="exampleInputEmail1" value="{{$customer->customer_phone}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình đại diện</label>
                                    <input type="file" name="customer_image" class="form-control" id="exampleInputEmail1">
                                    <br> </br>
                                    <img src="{{URL::to('public/upload/customer/'.$customer->customer_image)}}" height="100" width="90" >
                                </div>

                                <button type="submit" name="add_customer" class="btn btn-info">Cập nhật</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection