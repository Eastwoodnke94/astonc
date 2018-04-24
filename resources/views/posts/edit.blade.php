@extends('layouts.app')

@section('content')
    <h1>Edit Event</h1>
    <!--$post-> make sure that it updatate the Event with same id-->
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'Name of the event'])}}
    </div>
    <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description',$post->description, ['class' => 'form-control', 'placeholder' => 'description of the event'])}}
    </div>
    <div class="form-group">
            {{Form::label('due_date', 'Due Date')}}
            {{Form::date('due_date', $post->due_date, ['class' => 'form-control', 'placeholder' => 'Due date of the Event'])}}
    </div>
    <div class="form-group">
                {{Form::label('time', 'Time')}}
                {{Form::time('time', '', ['class' => 'form-control', 'placeholder' => 'Event time'])}}
    </div>
    <div class="form-group">
            {{Form::label('contact', 'Phone Number')}}
            {{Form::text('contact', $post->contact, ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
    </div>
    <div class="form-group">
            {{Form::label('venue', 'Venue of The  Event')}}
            {{Form::text('venue', $post->venue, ['class' => 'form-control', 'placeholder' => 'Venue of the Event'])}}
    </div>
    <div class="form-group">
            {{Form::label('type', 'Event Type')}}
            {{Form::select('type',['sport' => 'sport', 'culture' => 'culture', 'other' => 'other'])}}
    </div>
    <div class="form-group">
                {{Form::file('image')}}
   </div>
    {{Form::hidden('_method','PUT')}} 
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection