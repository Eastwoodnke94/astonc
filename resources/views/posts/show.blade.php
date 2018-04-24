@extends('layouts.app')

@section('content')
<br><br>
    <a button href="/posts"type="button" class="btn btn-primary">Go Back</button></a>
    <br><br>
    <h1 style="color:darkslategrey">{{$post->name}}</h1>
    <div id="wrapper">
        <div>
            <img style="width:97%" src="/storage/images/{{$post->image}}"> 
        </div>
        
        <div class="card-ev" style="width: 24rem;">
                <img class="card-img-top" src="/img/s4.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$post->user->name}}</h5>
                  <p class="card-text">Hi, Thanks for taking time to view my event, please if you have any question contact me</p>
                  <a href="mailto:{{$post->user->email}}">Contact Me</a>
                </div>
        </div>
    </div>
    <br><br>
    <div class="Event-description">
        {{$post->description}}
        <br>
        <p><strong>Event type:</strong> {{$post->type}}</p>
        <p><strong>Event date:</strong> {{$post->due_date}}</p>
        <p><strong>Event time:</strong> {{$post->time}}</p>
        <p><strong>The Event venue:</strong> {{$post->venue}}</p>
        <p><strong>Tel number:</strong> {{$post->contact}}</p>
    </div>
    <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
    <hr>
    <!--if the user is not registered they cannot edit the post-->

    @if(!Auth::guest())
         @if(Auth::user()->id == $post->user_id)   
           
            <!--this Groups the button-->
            <div class="btn-group" role="group" aria-label="Basic example">
                    <!--edit button-->
                    <a button href="/posts/{{$post->id}}/edit" type="button" class="btn btn-light">Edit</button></a>
                    <!--delete button-->
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                  </div>
          @endif
        @endif
        <br><br>
@endsection