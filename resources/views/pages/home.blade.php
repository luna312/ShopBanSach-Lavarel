@extends('layout')
@section('content')
<div style="display: flex;flex-direction: column;">
<div id="slideshow">
  <div class="slide-wrapper" >
    <div class="slide"><img src="https://file.qdnd.vn/data/images/0/2020/11/24/phucthang/aaa%20copy.jpg?dpi=150&quality=100&w=575"></div>
    <div class="slide"><img src="https://64.media.tumblr.com/2f6bdc0083b66be328ec4678551b353f/842ac2a429a842d3-d9/s500x750/b6f5e23cbee7839394fefb3105ce374a149c873a.jpg"></div>
    <div class="slide"><img src="https://upanh.vn-z.vn/images/2019/01/14/1.-Shonen-Jump.jpg"></div>
  </div>
</div>
<div class="features_items">

     <h2 class="underline">Sản phẩm mới</h2>
     @foreach($all_product as $key => $product)
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
<!--                 <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div> -->
            </div>
            
        </div> 
        @endforeach
             <h2 class="underline">Sản phẩm nổi bật</h2>
     @foreach($impress_product as $key => $product)
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
<!--                 <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div> -->
            </div>
            
        </div> 
        @endforeach
    </div>
</div>
    @endsection
