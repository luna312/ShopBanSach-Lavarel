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
            <th>Tên</th>
            
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Địa Chỉ</th>
            <th>Số điện thoại</th>
            <th>Hình đại diện</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_customer as $key => $customer)
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_email}}</td>
            
            <td>{{$customer->customer_password}}</td>
            <td>{{$customer->customer_address}}</td>
          <td>{{$customer->customer_phone}}</td>
          <td><img src="public/upload/customer/{{$customer->customer_image}}" height="100"width="90"></td>

            <td>
              <a href="{{URL::to('/edit-customer/'.$customer->customer_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-customer/'.$customer->customer_id)}}" class="active" ui-toggle-class="">
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
                  {{ $all_customer->appends(['sort' => 'customer_id'])->links() }}
              </div>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection