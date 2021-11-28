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
                  <li class="active"><span >Giỏ hàng của bạn (^-^)</span></li>
                </ol>
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
									<input class="cart_quantity_input" type="number" name="quantity_pro_cart" value="{{$value_cont->qty}}" >
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
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">

			<div class="row">

				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::priceTotal(0,',','.').' '.'VNĐ'}}</span></li>
							<li>Thuế (10%)<span>{{Cart::tax(0,',','.').' '.'VNĐ'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền<span>{{Cart::total(0,',','.').' '.'VNĐ'}}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							                               
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){
                                ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                
                                <?php
                                }else{
                                ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                                <?php
                                }
                                ?>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
</div>
@endsection