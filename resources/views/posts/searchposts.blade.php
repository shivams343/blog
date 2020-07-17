@extends('layouts.app')
<style type="text/css">
    .avatar{
     border-radius: 100%;
     max-width: 100px;
   }
   .lead{
    color: gray;
   width: 100px;
  height: 30px;
  border: 1px solid grey;
  box-sizing: border-box;
   }
   .post{
    max-width: 500px;
   }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                  @if(count($errors) >0)
                     @foreach($error->all() as $error)
                         <div class="elert alert-danger">{{$error}}</div>
                     @endforeach 
                 @endif    

                 @if(session('response'))
                    <div class="alert alert-success">{{session('response')}}</div>
                 @endif
            <div class="card">
                <div class="card-header">
                    <div class=row>
                        <div class="col-md-4">DASHBOARD</div>
                        <div class="col-lg-8">
                            <form method="POST" action="{{ url('/search')}}">{{csrf_field()}}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default fas fa-search"></button>
                                    </span>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                       
                <div class="card-body">
                   <div class="col-md-4"> 
                    @if(!empty($profile))
                         <img src="{{ $profile->profile_pic}}" class="avatar" alt=" ">  
                    @else
                         <img src="{{ url('images/Avatar.png')}}" alt="" class="avatar">
                    @endif
                    
                    @if(!empty($profile))
                           <p class="lead">{{ $profile->name}}</p>  
                    @else
                           <p class="lead"></p>
                    @endif
                    @if(!empty($profile))
                          <p class="lead">{{ $profile->designation}}</p>  
                    @else
                           <p class="lead"></p>
                    @endif

                   </div>
                   <div class="col-md-8">
                       @if(count($posts)>0)
                           @foreach($posts->all() as $post)
                           <h4>{{$post->post_title}}</h4>
                           <img src="{{$post->post_image}}" class="post" alt="">
                           <p>{{substr($post->post_body,0,150)}}</p>

                            <ul class="nav nav-pills" role="tablist">
                            
                                <li role="presentation ">
                                    <a href='{{ url("/view/{$post->id}")}}'>
                                        <span class="fa fa-eye"> VIEW </span>
                                    </a>
                                </li>
                                 <li role="presentation">
                                    <a href='{{ url("/edit/{$post->id}")}}'>
                                        <span class="fa fa-pencil-square-o"> EDIT</span>
                                    </a>
                                </li>
                                 <li role="presentation">
                                    <a href='{{ url("/delete/{$post->id}")}}'>
                                        <span class="fa fa-trash-o"> DELETE</span>
                                    </a>
                                </li>
                            </ul>

                           <cite style="">Posted on: {{date('M j, Y H:i',strtotime($post->updated_at))}}</cite>
                           <hr/>
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
@endsection
