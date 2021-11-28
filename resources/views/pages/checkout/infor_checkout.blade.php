@extends('layout')
@section('content')
<div class="cart_content">
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-arrow" style="text-transform:uppercase;">
                  <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                  </li>
                  <li class="active"><span >Checkout</span></li>
                </ol>
            </div>

		


				                        		<?php
								$message = Session::get('message');
								if($message){
									echo '<span class="text-alert" style="color:red;font-size:17px;font-weight:bold">',$message,'</span>';
									Session::put('message',null);
								}
								?>
			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-15 clearfix">
						<div class="bill-to">
							<p>Thông tin giao hàng</p>
							<?php
							$ship_id = Session::get('ship_id');
							if($ship_id != NULL){
									 $get_ship = DB::table('tbl_ship')->where('ship_id',Session::get('ship_id'))->get();
							?>
						
								@foreach($get_ship as $key => $ship) 
								<div class="form-one">
									<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
										{{ csrf_field()}}
										<input type="text" name="ship_email" placeholder="Email*" value="{{$ship->ship_email}}">
										<input type="text" name="ship_name" placeholder="Họ và tên *" value="{{$ship->ship_name}}">
										<input type="text" name="ship_address" placeholder="Địa Chỉ" value="{{$ship->ship_address}}">
										<input type="text" name="ship_phone" placeholder="SĐT" value="{{$ship->ship_phone}}">
										<textarea class="desc_payment"name="ship_content" placeholder="Ghi chú cho đơn hàng của bạn" rows="12" >{{$ship->ship_content}}</textarea>	
									
										<a class="btn btn-default" href="{{URL::to('/show-cart')}} ">Trở về giỏ hàng</a>									
										<input type="submit" value="Thanh toán" name="save_order" class="btn btn-primary" style="margin-top:10px;background:#c83548; width: 150px;height: 40px;margin-left: 50px;">
										 
									</form>

								</div>
								@endforeach	
							<?php
							}else{
							?>
								
								<div class="form-one">
									<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
										{{ csrf_field()}}
										<input type="text" name="ship_email" placeholder="Email*" >
										
										<input type="text" name="ship_name" placeholder="Họ và tên *">
										<input type="text" name="ship_address" placeholder="Địa Chỉ">
										<input type="text" name="ship_phone" placeholder="SĐT">
										<textarea class="desc_payment"name="ship_content" placeholder="Ghi chú cho đơn hàng của bạn" rows="12" ></textarea>	
									
										<a class="btn btn-default" href="{{URL::to('/show-cart')}} ">Trở về giỏ hàng</a>									
										<input type="submit" value="Thanh toán" name="save_order" class="btn btn-primary" style="color:white;margin-top:10px;background:#c83548; width: 150px;height: 40px;margin-left: 50px;">
										 
									</form>

								</div>
								
							<?php	
							}
							?>

<!-- 													$data=  array();
					        	$data['ship_name'] =  "a";
					        	$data['ship_content']= "a";
					        	$data['ship_address']= "a";
					        	$data['ship_phone']= "a";
					        	$data['ship_email']= "a";
								$get_ship = $data ;  -->
						</div>
					</div>
					
				</div>
			</div>

		</div>
	</section> <!--/#cart_items-->
</div>
@endsection