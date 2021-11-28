@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Xem bài viết
    </div>
    @foreach($show_posts as $key => $post)
    <div class="container">
      
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
    </div>
    <div style="margin-left: 650px; border: 2px solid #c83548;height: 60px;width: 100px;">
        <a  style="text-decoration: none;  "href="{{URL::to('/check-post')}}">
            <div class="edit-post">
                <p style="padding-top:20px;color: #c83548; padding-left: 25px;">Trở về</p>
            </div>
        </a>
    </div>
    @endforeach
  </div>

@endsection