@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">

				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<?php
						$message = Session::get('message');
						if($message){
							echo '<span style="font-weight: bold;font-size: 17px;"class="text-alert" >',$message,'</span>';
							Session::put('message',null);
						}
						?>
						<h2>Đăng Nhập</h2>

						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="password_account" placeholder="Password" />
<!-- 							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span> -->
							<button type="submit" class="btn btn-primary" style="margin-top:10px;background:#c83548; width: 150px;height: 40px;margin-left: 100px";>Đăng Nhập</button>															
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					
				</div>
				<div class="col-sm-4" style="border-left: #ff0000 solid 2px;">
					<div class="signup-form" style="margin-left: 20px; margin-bottom: 10px;">
						<h2>Đăng Ký</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{csrf_field()}}
							
							<input type="text" name="customer_name" placeholder="Họ và tên"/>
							<input type="email" name="customer_email"placeholder="Địa Chỉ Email"/>
							<input type="password" name="customer_password"placeholder="Mật Khẩu"/>
							<input type="address" name="customer_address"placeholder="Địa Chỉ"/>
							<input type="text" name="customer_phone"placeholder="SĐT"/>
							<button type="submit" class="btn btn-primary" style="margin-top:10px;background:#c83548; width: 150px;height: 40px;margin-left: 50px;">Đăng Ký</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection