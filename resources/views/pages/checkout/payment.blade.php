@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<?php
					$content = Cart::content();
   	// echo'<pre>';
   	// print_r($content);
   	// echo'</pre>';
					?>
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $key => $value_cont)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/upload/product/'.$value_cont->options->image)}}"  width="60" height="50" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value_cont->name}}</a></h4>
								<p>ID Sản Phẩm: {{$value_cont->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($value_cont->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update_quantity_cart')}}" method="POST">
										{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="quantity_pro_cart" value="{{$value_cont->qty}}" >
									<input type="hidden" value="{{$value_cont->rowId}}" name="rowId_pro_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_quantity" class="btn btn-default btn-sm">
								</form>				
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$total_pro= $value_cont->price*$value_cont->qty;
										echo number_format($total_pro),' ','VNĐ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-choose-cart/'.$value_cont->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

						
					</tbody>
				</table>
			</div>
			<h4 style="margin: 40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{csrf_field()}}
			<div class="payment-option">
<!-- 					<span>
						<label><input name="payment_option" value="1"type="checkbox"> Trả thẻ atm</label>
					</span> -->
					<span>
						<label><input name="payment_option" value="2"type="checkbox"> Trả trực tiếp</label>
					</span>
<!-- 					<span>
						<label><input name="payment_ption" value="3"type="checkbox"> Thẻ ghi nợ</label>
					</span>
 -->					<input type="submit" value="Đặt hàng" name="save_order" class="btn btn-primary btn-sm">
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->
@endsection