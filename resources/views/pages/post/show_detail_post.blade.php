@extends('layout')
@section('content')

@foreach($show_posts as $key => $post)
<div class="container"><!--product-details-->
        <div class="breadcrumbs">
        <ol class="breadcrumb breadcrumb-arrow" style="text-transform:uppercase;">
          <li>
            <a href="{{URL::to('/')}}">Trang chủ</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="">Bài viết</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li class="active"><a href="{{URL::to('/chi-tiet-bai-viet/'.$post->post_id)}}">Bài viết số:&nbsp;{{$post->post_id}}</a></li>
        </ol>
    </div>

	<div class="preview col-sm-12">
		<h2 class="detail-post-title">{{$post->post_title}}</h2>
		<div style="display: flex;flex-direction: row;">
			<div>
				<p><i class="fas fa-clock red-color post-clock"></i> Vào lúc: {{$post->post_date}} </p>
			</div>
			<div style="display: flex;flex-direction: row; margin-left: 300px; ">
				<p>Tác giả: &nbsp;</p>
				<p class="post-infor-name">{{$post->customer_name}} </p>
			</div>
		</div>
		
				<p class="detail-post-desc">{{$post->post_desc}}<p>
			<div>
				<p rows="8" class="detail-post-content"> {!!$post->post_content!!}</p>
			</div>
	</div>

</div>

</div><!--/product-details-->				
<div class="productplus col-lg-12">
    <div class="product-comment">
        <ul class="product-tablist nav nav-tabs" id="tab-product-template">
             <li class="active">
                <a data-toggle="tab" href="#comment" aria-controls="comment" role="tab" aria-expanded="false">
                    <span>BÌNH LUẬN</span>
                </a>
            </li>
            
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="comment" class="tab-pane fade active in">
				<div class="col-sm-12">
					<form >
						@csrf						
						<input type="hidden" name="comment_post_id" class="comment_post_id" value="{{$post->post_id}}">
						<div id="comment_post_show" style="height: 100%; width: 100%;">
							
						</div>
				</form>
					
					<form action="#" class="input_comment_post">
						
						<input type="text" name="comment_post_name" class="comment_post_name"  placeholder="Nhập tên bình luận" value=""/>
							
						
						<textarea name="comment_post" class="comment_post_content" placeholder="Nội dung bình luận"></textarea>
						
						<button type="button" class="btn btn-default pull-right send-comment-post" style="width: 100px;margin-left: 200px;">
							Bình luận
						</button>
						<div id="nortify_comment_post">

						</div>

					</form>
				</div>
            </div>
                
        </div>
    </div>
</div>
	@endforeach
</div><!--/category-tab-->



@endsection
