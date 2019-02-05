@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="callout alert" role="alert">
            <b> {{$error}}</b>

        </div>
    @endforeach

@endif

@if(session('success'))
    <div class="callout success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="callout ">
        {{session('error')}}
    </div>
@endif<?php
/**
 * Created by PhpStorm.
 * User: ASIF
 * Date: 04-Feb-19
 * Time: 10:46 PM
 */