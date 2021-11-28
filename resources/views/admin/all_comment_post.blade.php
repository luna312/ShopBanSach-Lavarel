@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận
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
            
            <th>Tên người bình luận</th>
            <th>Bình luận</th>
            <th>Ngày bình luận</th>
            <th>Tên bài viết</th>
            


            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($comment_post as $key => $comm)
          <tr>
            
            <td>{{$comm->comment_post_name}}</td>
            
            <td>{{$comm->comment_post}}</td>
            <td>{{$comm->comment_post_date}}</td>
            <td>{{$comm->post_title}}</td>

          
            
            <td>
             
               <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-comment-post/'.$comm->comment_post_id)}}" class="active" ui-toggle-class="">
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
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <div class="text-center">
               {{ $comment_post->appends(['sort' => 'comment_post_id'])->links() }}
          </div> 
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection