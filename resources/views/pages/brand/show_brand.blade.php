@extends('layout')
@section('content')

<div class="features_items"><!--features_items-->
        @foreach($brand_name as $key => $brand_name_header)
            <div class="breadcrumbs">
                <ol class="breadcrumb breadcrumb-arrow" style="text-transform:uppercase;">
                  <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                  </li>
                  <li>
                    <a href="{{URL::to('/')}}">Thương hiệu</a>
                    <i class="fa fa-angle-right"></i>
                    </li>
                  <li class="active"><span >{{$brand_name_header->brand_name}}</span></li>
                </ol>
            </div>

<h2 class="title text-center" style="text-align: left;font-size: 28px;font-weight: bold;">{{$brand_name_header->brand_name}}</h2>
 @endforeach
 @foreach($brand_by_id as $key => $product)
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <div class="col-lg-4 "style="width: 270px">
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
                                                    <p class="product_name_min">{{$product->product_name}}</p>
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

                                    </div>
                                    
                            </div>  
                    </a>
                        @endforeach
                    </div>
                                                      <div class="text-center">
                  {{ $brand_by_id->appends(['sort' => 'brand_id'])->links() }}
              </div> 

@endsection
