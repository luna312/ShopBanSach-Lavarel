@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
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

            <th>Tên người đặt</th>
            <th>Tổng giá tiền</th>
            <th>Ngày đặt</th>
            <th>Trình trạng đơn hàng</th>
            <th></th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_order as $key => $order)
          <tr>
           
            <td>{{($order->customer_name)}}</td>
            <td>{{($order->order_total)}}</td>
            <td>{{($order->order_date)}}</td>
            <td>
              <form role="form" action="{{URL::to('/update-order/'.$order->order_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                <div >
                    <select name="order_status">
                      <option selected value="{{$order->order_status}}">{{$order->order_status}}</option>
                      <option value="Đang xử lý đơn hàng">Đang xử lý đơn hàng</option>
                      <option value="Đang vận chuyển">Đang vận chuyển</option>
                      <option value="Đã giao hàng">Đã giao hàng</option>
                    </select>
                    <button type="submit" name="update_order" class="btn btn-info">Cập nhật</button>
                </div>
                
              </form>
            </td>
            <td>
              <a href="{{URL::to('/edit-order/'.$order->order_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
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
                  {{ $all_order->appends(['sort' => 'order_id'])->links() }}
              </div> 
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection