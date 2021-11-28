@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tài khoản
    </div>
    <div class="table-responsive">
                                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Role</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Tên</th>
            <th>Số điện thoại</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_admin as $key => $admin)
          <tr>
            <td>
              <span class="text-ellipsis">
                 <?php
                    if($admin->admin_role==1){
                    ?>
                   <p>Quản lý</p>
                    <?php
                    }else{
                    ?>
                   <p>Nhân viên</p>
                <?php
                }
                ?>
              </span>
            </td>
            <td>{{$admin->admin_email}}</td>
            <td>{{$admin->admin_password}}</td>
            <td>{{$admin->admin_name}}</td>
          <td>{{$admin->admin_phone}}</td>

            <td>
              <a href="{{URL::to('/edit-admin/'.$admin->admin_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-admin/'.$admin->admin_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
              <div class="text-center">
                  {{ $all_admin->appends(['sort' => 'admin_id'])->links() }}
              </div>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection