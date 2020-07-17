@extends('layouts.app')
<style type="text/css">
    
   .post{
    max-width: 500px;
   }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('response'))
              <div class="alert alert-success">{{session('response')}}</div>
             @endif
            <div class="card text-centre">
                <div class="card-header">{{ __('POST VIEW') }}</div>
                <div class="card-body">
                   <div class="col-md-4">
                     <ul class="list-group">
                      @if(count($categories)>0)
                         @foreach($categories->all() as $category)
                         <li class="list-group-item">
                         <a href='{{ url("category/{$category->id}")}}'>{{$category->category}}</a>
                         </li>
                         @endforeach
                      @else
                      <p>No Category Found</p>
                      @endif
                       
                     </ul>
                   </div>
                
                   <div class="col-md-8">
                       @if(count($posts)>0)
                           @foreach($posts->all() as $post)
                           <h4>{{$post->post_title}}</h4>
                           <img src="{{$post->post_image}}" class="post" alt="">
                           <p>{{$post->post_body}}</p>

                            <ul class="nav nav-pills" role="tablist">
                            
                                <li role="presentation ">
                                    <a href='{{ url("/like/{$post->id}")}}'>
                                        <span class="fa fa-thumbs-up"> LIKE ({{$likeCtr}})</span>
                                    </a>
                                </li>
                                 <li role="presentation">
                                    <a href='{{ url("/dislike/{$post->id}")}}'>
                                        <span class="fa fa-thumbs-down"> DISLIKE ({{$dislikeCtr}})</span>
                                    </a>
                                </li>
                                 <li role="presentation">
                                    <a href="{{ url('/comment/{$post->id}')}} ">
                                        <span class="fa fa-comment-o"> COMMENT ()</span>
                                    </a>
                                </li>
                            </ul>

                           @endforeach
                       @else
                           <p>No Post Available!</p>
                       @endif

                       <form method="POST" action='{{ url("/comment/{$post->id}")}}'>
                        {{csrf_field()}}
                         <div class="form-group">
                           <textarea id="comment" rows="6" class="form-control" name="comment" required autofocus>
                           </textarea>
                        </div>
                         <div class="form-group">
                           <button type="submit" class="btn btn-success btn-lg btn-block">POST COMMENT</button>
                         </div>
                       </form>

                       <h3>Comments</h3>
                        @if(count($comments)>0)
                           @foreach($comments->all() as $comment)
                               <p>{{$comment->comment}}</p>
                               <p>Posted by: {{$comment->name}}</p>
                           @endforeach
                       @else
                           <p>No Comment Available!</p>
                       @endif
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
