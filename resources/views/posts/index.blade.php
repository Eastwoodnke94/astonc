@extends('layouts.app')
@section('content')
<!--This is the page that show the events-->
    <h1>Events</h1>
    <!--if post/events less than zero -->
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well"> 
                <div class="jumbotron">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                             <img style="width:100%" src="/storage/images/{{$post->image}}">
                      </div>
                        <div class="col-md-8 col-sm-8">                     
                            <h3><a href="/posts/{{$post->id}}">{{$post->name}}</a></h3>
                            <p><strong>Event type:</strong> {{$post->type}}</p>
                             <p><strong>Event date:</strong> {{$post->due_date}}</p>
                            <small>Written on {{$post->created_at}} By {{$post->user->name}} </small>  
                        </div>
                        
                    </div>   
                </div>
            </div>
            
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Events at the moment</p>
    @endif

@endsection