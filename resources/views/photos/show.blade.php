@extends('layouts.app')

@section('content')
    <h3>{{$photo->title}}</h3>

   <p> {{$photo->description}}</p>
    <br>
    <a class="button primary" href="/albums/{{$photo->album_id}}">Go Back to Album</a>
    <br>
    <center>
        <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
    </center>
    <br>    <br>

    {!! Form::open(['action' => ['PhotosController@destroy',$photo->id],'method'=>'POST'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete Photo',['class'=>'button alert'])}}
    {!! Form::close() !!}

    @endsection