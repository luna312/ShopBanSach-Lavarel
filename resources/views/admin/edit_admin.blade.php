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
                                @foreach($edit_admin as $key =>$admin_value)
                            	<form role="form" action="{{URL::to('/update-admin/'.$admin_value->admin_id)}}" method="post" enctype="multipart/form-data">
                            		{{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <select style="width: 100px;" name="admin_role" class="form-control input-sm m-bot15">
                                        
                                        @if($admin_value->admin_role==1)
                                            <option value="1">Quản lý</option>
                                        @else
                                            <option selected value="2">Nhân viên</option> 
                                            <option value="1">Quản lý</option>
                                             
                                        @endif   
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input  type="text" name="admin_email" class="form-control" id="exampleInputEmail1" value="{{$admin_value->admin_email}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="admin_password" class="form-control" id="exampleInputEmail1" value="{{$admin_value->admin_password}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" value="{{$admin_value->admin_name}}">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" value="{{$admin_value->admin_phone}}">
                                </div>

                                <button type="submit" name="add_admin" class="btn btn-info">Cập nhật</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection