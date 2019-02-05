@extends('layouts.app')

@section('content')

    <h3>{{$album->name}}</h3>

    <a class="button secondary" href="/">Go Back</a>
    <a class="button primary" href="/photos/create/{{$album->id}}">Upload A Photo</a>
    <a class="button alert float-right" href="/albums/delete/{{$album->id}}">Delete Album</a>
    <hr>

    {{--to count how many photos in album we can write because we created relationship--}}
    @if(count($album->photos) > 0)
        <?php
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div id="albums">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class='medium-4 columns end'>
                            <a href="/photos/{{$photo->id}}">
                                                            {{--IN STORAGE FOLDER  FOLDER CREATED WITH NAME OF ALBUM_ID/SHOW IN PHOTO TABLE THAT PHOTO--}}
                                <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"
                                     alt="{{$photo->title}}">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>
                            @else
                                <div class='medium-4 columns'>
                                    <a href="/photos/{{$photo->id}}">
                                        <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"
                                             alt="{{$photo->title}}">
                                    </a>
                                    <br>
                                    <h4>{{$photo->title}}</h4>
                                    @endif
                                    @if($i % 3 == 0)
                                </div></div><div class="row text-center">
                            @else
                        </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <p>No Photos To Display</p>
    @endif
    @endsection
