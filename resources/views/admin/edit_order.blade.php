@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
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

            <th>Tên người mua</th>
            <th>SDT</th>
          

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
          
            <td>{{$order_by_id_first->customer_name}}</td>
            <td>{{$order_by_id_first->customer_phone}}</td>
          

            
          </tr>
      
        </tbody>
      </table>
    </div>
    
  </div>
</div>
<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
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

            <th>Tên người vận chuyển</th>
            <th>Địa Chỉ</th>
            <th>SDT</th>


            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <th>{{$order_by_id_first->ship_name}}</th>
            <th>{{$order_by_id_first->ship_address}}</th>
            <th>{{$order_by_id_first->ship_phone}}</th>  
          </tr>
       
        </tbody>
      </table>
    </div>
    
  </div>
</div>
<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
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
            
            <th>Tên Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            <th>Tổng tiền bao gồm thuế</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($order_by_id as $content)
          <tr>
            <th>{{$content->product_name}}</th>
            <th>{{$content->product_buy_quantity}}</th>
            <th>{{$content->product_price}}</th>
            <th>{{$content->product_price*$content->product_buy_quantity}}</th>
            <th>{{$content->order_total}}</th>
          </tr> 
        @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

      </div>
    </footer>
  </div>
</div>
@endsection