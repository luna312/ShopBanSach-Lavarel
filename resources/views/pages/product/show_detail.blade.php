@extends('layout')
@section('content')

@foreach($detail_product as $key => $value_detail)

<div class="container"><!--product-details-->

             <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-arrow" style="text-transform:uppercase;">
                  <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                  </li>
                  <li>
                    <a href="{{URL::to('/')}}">Sản Phẩm</a>
                    <i class="fa fa-angle-right"></i>
                    </li>
                  <li class="active"><a href="{{URL::to('/danh-muc-san-pham/'.$value_detail->category_id)}}">{{$value_detail->category_name}}</a></li>
                </ol>
            </div>
	
	<div class="preview col-sm-6">
		<div class="preview-pic tab-content">
			<div class="tab-pane active" id="pic-1">
				<img src="{{URL::to('/public/upload/product/'.$value_detail->product_image)}}" alt=""/>
			</div> 
			<div class="tab-pane" id="pic-2">
				<img src="{{URL::to('/public/upload/product/'.$value_detail->product_image_second)}}" alt=""/>
			</div>
			<ul class="preview-thumbnail nav nav-tabs">
				
	              <li class="active">
	              	<a data-target="#pic-1" data-toggle="tab" class="">
	              		<img src="{{URL::to('/public/upload/product/'.$value_detail->product_image)}}" alt="">
	              	</a>
	              </li> 
	              <li>
	              	<a data-target="#pic-2" data-toggle="tab" class="">
	              		<img src="{{URL::to('/public/upload/product/'.$value_detail->product_image_second)}}" alt="">
	              	</a>
	              </li> 
	         </ul> 
		</div>
	</div>

	<div class="detail-right col-sm-6">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2>{{$value_detail->product_name}}</h2>
			<p>Mã ID: {{$value_detail->product_id}}</p>
			<img src="images/product-details/rating.png" alt="" />

		<form action="{{URL::to('/save-cart')}}" method="POST">
				{{  csrf_field() }}

			<div class="qty-group">
				<p class="qty-price">{{number_format($value_detail->product_price).' '.'VNĐ'}}</p>
				<p>Số lượng:</p>
				
					<input onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty) &amp; qty > 1 ) result.value--;return false;" type='button' value='-' class="qty-btn"/>
					<input type="text" id='quantity' min='1' name='quantity' value='1' class="input-qty"/>
					<input onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' class="qty-btn"/>
	
				<input name="product_id_hidden" type="hidden"  value="{{$value_detail->product_id}}" />

			</div>
			<?php
				if($value_detail->product_quantity<=0){
			?>
				<p><b>Trình trạng:</b> Hết hàng</p>
			<?php
				}else{
			?>
				<p><b>Trình trạng:</b> Còn hàng</p>
			<?php
				}
			?>
			<p><b>Điều kiện:</b> New</p>
			<p><b>Thương hiệu:</b> {{$value_detail->brand_name}}</p>
			<p><b>Danh mục:</b> {{$value_detail->category_name}}</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
			<button type="submit" class="product-btn-addtocart">
				<i class="fa fa-shopping-cart"></i>
				Thêm giỏ hàng
			</button>
		</form>
			<div class="information-more">
				<strong>Ưu đãi dành riêng cho khách hàng đặt trước Online:</strong> 
				<ul> 
					<li><i class="fa fa-check"></i> Có thể nhận hàng tại shop.</li> 								
					<li><i class="fa fa-check"></i> Giao hàng toàn quốc. Thời gian giao hàng từ 3 - 7 ngày </li> 								
					<li><i class="fa fa-check"></i> Bọc plastic miễn phí cho Light Novel đặt mua trước ngày phát hành dự kiến.</li> 								
					<li><i class="fa fa-check"></i> Tặng bao bảo vệ cho mọi sản phẩm.</li> 								
					<li><i class="fa fa-check"></i> Đổi trả trong 30 ngày.</li> 							
				</ul>
			</div>
		</div><!--/product-information-->
	</div>
</div>

</div><!--/product-details-->				
<div class="productplus col-lg-12">
    <div class="product-comment">
        <ul class="product-tablist nav nav-tabs" id="tab-product-template">
            <li class="active" >
                <a data-toggle="tab" aria-controls="mota" role="tab" href="#description" aria-expanded="true">
                    <span>MÔ TẢ CHI TIẾT</span>
                </a>
            </li>
            <li >
                <a data-toggle="tab" href="#content" aria-controls="true" role="tab" aria-expanded="false">
                    <span>NỘI DUNG SẢN PHẨM</span>
                </a>
            </li>
             <li >
                <a data-toggle="tab" href="#comment" aria-controls="comment" role="tab" aria-expanded="false">
                    <span>BÌNH LUẬN</span>
                </a>
            </li>
            
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="description" class="tab-pane fade active in">                                          

                <div class="container-fluid product-description-wrapper">
                	<p>{!!nl2br($value_detail->product_desc)!!}</p>	
                </div>
            </div>
            
            <div id="content" class="tab-pane fade">
                <div class="container-fluid product-description-wrapper">
					<p>{!!nl2br($value_detail->product_content)!!}</p>
                </div>
            </div>

            <div id="comment" class="tab-pane fade">
				<div class="col-sm-12">

					<form >
						@csrf

						
						<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value_detail->product_id}}">
						<div id="comment_show" style="height: 100%; width: 100%;">
							
						</div>

				</form>
					
					<form action="#" class="input_comment">
						
						<input type="text" name="comment_name" class="comment_name"  placeholder="Nhập tên bình luận" value=""/>
							
						
						<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
						
						<button type="button" class="btn btn-default pull-right send-comment">
							Bình luận
						</button>
						<div id="nortify_comment">

						</div>
						<b>Đánh giá sao: </b> 
						
							<ul class="list-inline rating" title="AvgTitle">
								@for($count=1; $count<=5; $count++)
									@php
										if($count <= $rating){
											$color = 'color:#ffcc00;';
									}else{
										$color = 'color:#ccc;';
								}
								@endphp
							<li title="star_rating" id="{{$value_detail->product_id}}-{{$count}}"
								data-index="{{$count}}" data-product_id="{{$value_detail->product_id}}"
								data-rating="{{$rating}}" class="rating" style="cursor: pointer;
								{{$color}} font-size: 30px;">&#9733;</li>
							@endfor
							</ul>
						
<!-- 						<img src="{{URL::to('/public/fontend/images/product-details/rating.png')}}" alt="" style="width: 120px; height: 20px;" /> -->

					</form>
				</div>
            </div>
                
        </div>
    </div>
</div>
	@endforeach
</div><!--/category-tab-->
<div class="recommended_items "><!--recommended_items-->
	<h2 class="title text-center" style="padding-left: 100px;">Sản phẩm liên quan</h2>
			<div class="item active" style="display: flex; justify-content:space-around; padding: 0 500px 0 600px;">	
				@foreach($related_product as $key => $related_pro)
				<div class="col-sm-4" style="width: 700px;height: 450px; ">
		            <div class="product-image-wrapper" >
		                <div class="single-products">
		                        <div class="productinfo text-center">
		                            <a href="{{URL::to('/chi-tiet-san-pham/'.$related_pro->product_id)}}">
		                                <img src="{{URL::to('public/upload/product/'.$related_pro->product_image)}}" alt=""  style="width: 200px;height: 300px;"/>
		                            </a>
		                            <p class="product_name_min" style="font-size: 17px;">{{$related_pro->product_name}}</p>
		                            <h2>{{number_format($related_pro->product_price).' '.'VNĐ'}}</h2>
		                            <form action="{{URL::to('/save-cart')}}" method="POST">
		                                {{  csrf_field() }}
		                                <span>
		                                    <input name="quantity" type="hidden" min="1" value="1" />
		                                    <input name="product_id_hidden" type="hidden"  value="{{$related_pro->product_id}}" />
		                                    <button type="submit" class="btn btn-fefault cart">
		                                        <i class="fa fa-shopping-cart"></i>
		                                        Thêm giỏ hàng
		                                    </button>
		                                </span>
		                            </form>
		                        </div>

		                </div>
		            </div>
				</div> 
				
				@endforeach
			</div>

</div><!--/recommended_items-->


@endsection
