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

                           
                           @endforeach
                       @else
                           <p>No Post Available!</p>
                       @endif
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
