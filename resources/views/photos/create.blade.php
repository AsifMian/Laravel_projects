@extends('layouts.app')

@section('content')

    <h3 class="text-center">Upload Photo</h3>
    {!! Form::open(['action'=>'PhotosController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
    {{Form::text('title','',['placeholder'=>'Photo name'])}}
    {{Form::textarea('description','',['placeholder'=>'photo description'])}}
    {{Form::hidden('album_id',$album_id)}}
    {{Form::file('photo')}}
    {{Form::submit('submit')}}
    {!!Form::close()  !!}

@endsection