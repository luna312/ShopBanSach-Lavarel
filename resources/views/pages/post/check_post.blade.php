@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>

    <div class="table-responsive">
                                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Hình bài viết</th>
            <th>Tên bài viết</th>
            <th>Mô tả bài viết</th>
            <th>Duyệt bài viết</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($show_posts as $key => $post)
          <tr>
            <td><img src="public/upload/post/{{$post->post_image}}" height="100"width="90"></td>
            <td>{{$post->post_meta_keywords}}</td>
            <td>{{$post->post_meta_desc}}</td>
            <td><span class="text-ellipsis">
                 <?php
                    if($post->post_status==0){
                    ?>
                    <a href="{{URL::to('/unactive-post/'.$post->post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                    <?php
                }else{
                    ?>
                   <a href="{{URL::to('/active-post/'.$post->post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
              <a href="{{URL::to('/watch-post/'.$post->post_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
                      <div class="text-center">
                {{ $show_posts->appends(['sort' => 'post_id'])->links() }}
            </div> 
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection