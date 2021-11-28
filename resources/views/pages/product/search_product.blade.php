@extends('layout')
@section('content')

<div class="features_items"><!--features_items-->
<h2  class="underline">Kết quả tìm kiếm</h2>
@foreach($search_product as $key => $product)
<div class="col-sm-4" style="width: 270px">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                <div class="image-overlay">
                                    <div class="image1">
                                        <img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" class="image" />
                                    </div>
                                    <div class="overlay">
                                        <img src="{{URL::to('public/upload/product/'.$product->product_image_second)}}" alt="" class="image" />
                                    </div>
                                </div>
                            </a>
                            <p>{{$product->product_name}}</p>
                            <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                {{  csrf_field() }}
                                <span>
                                    <input name="quantity" type="hidden" min="1" value="1" />
                                    <input name="product_id_hidden" type="hidden"  value="{{$product->product_id}}" />
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm giỏ hàng
                                    </button>
                                </span>
                            </form>
                        </div>

                </div>
<!--                 <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div> -->
            </div>
            
        </div>  
                        @endforeach
                    </div><!--features_items-->

@endsection
