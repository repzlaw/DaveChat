@extends('layouts.app')


@section('content')
 
<div class="index">
<h2> DaveChat is a Platform to share your mind to the world without the baggage of friends.<h2> just do what you what you 
want.</h2><h2> We are all equal. meet random people all the time but don't connect!!! </h2>
</div>

<br>

<div class="flex-center position-ref full-height" style=" ">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())

                {{-- <a href="{{ url('/home') }}">Home</a> --}}
           
            @endif
        </div>
    @endif

   
    
    <div class="content" >
        <div class="title m-b-md">
            {{-- <img style="width: 50px" src="img\davechat1.jpg" alt=""> --}}
            DaveChat
        </div>

        {{-- <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div> --}}
    </div>
</div>









@endsection