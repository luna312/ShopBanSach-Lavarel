@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
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

            <th>Tên sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Hình sản phẩm thứ 2</th>
            <th>Danh mục sản phẩm</th>
            <th>Thương hiệu sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hển thị</th>
            <th>Số lượng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_product as $key => $pro)
          <tr>
            <td>{{$pro->product_name}}</td>
            <td><img src="public/upload/product/{{$pro->product_image}}" height="100"width="90"></td>
            <td><img src="public/upload/product/{{$pro->product_image_second}}" height="100"width="90"></td>
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->brand_name}}</td>
          <td>{{$pro->product_price}}</td>
            <td><span class="text-ellipsis">
                 <?php
                    if($pro->product_status==0){
                    ?>
                    <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                    <?php
                }else{
                    ?>
                   <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                }
                ?>
            </span></td>
            <td>{{$pro->product_quantity}}</td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
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
                  {{ $all_product->appends(['sort' => 'product_id'])->links() }}
              </div> 
          
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection