@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm tài khoản
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
                                
                                <form role="form" action="{{URL::to('/save-admin/')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <select style="width: 100px;" name="admin_role" class="form-control input-sm m-bot15">
                                        
                                     
                                      
                                            <option value="1">Quản lý</option>
                                            <option value="2">Nhân viên</option>  
                                      
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input  type="text" name="admin_email" class="form-control" id="exampleInputEmail1" >
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="admin_password" class="form-control" id="exampleInputEmail1" >
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" >
                                </div>

                                <button type="submit" name="add_admin" class="btn btn-info">Thêm</button>
                            </form>
                           
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection