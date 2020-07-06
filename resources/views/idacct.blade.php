@extends('layouts.app')

@section('title')
    My Account
@endsection

@section('content')
    <div class="container">
        
    <form  class="form-group" >
        
        
       
        <img  src="/storage/p_pixs/{{$user->p_pix}}" class="img-responsive">  
        
        {{-- <img src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id .'.jpg' ]) }}" class="img-responsive"> --}}
   
        
       
        {{-- @foreach ($posts as $post) --}}
@if (auth::user()->id == $post)

           
                
          
            
        
        <h3><a href="{{route('acctUpdate')}}" class="btn btn-info" >update profile</a></h3>
        <br><br>
        @endif
        {{-- @endforeach --}}
        {{-- store/{{$store->id}} --}}
        
        <div class="col-md-6">
            <label for="fname"> First  Name</label>

             <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}" disabled>
             {{-- {{$user->name}} --}}
         </div>
        
         <div class="col-md-6">
        <label for="lname">Last  Name</label>

        <input type="text" class="form-control" id="lname" name="lname" value="{{$user->lname}}" disabled>
         </div><hr><br><br><br>
         <div class="col-md-6">
        <label for="oname">Other  Name</label>

        <input type="text" class="form-control" id="oname" name="oname" value="{{$user->oname}}" disabled>
         </div>
         <div class="col-md-6">
        <label for="dob">Date Of Birth</label>

        <input type="date" class="form-control" id="dob" name="dob" value="{{$user->dob}}" disabled>
         </div><hr><br><br>
         <div class="col-md-6">
        <label for="email">Email</label>

        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled> 
        {{--  --}}
         </div>
        
         <div class="col-md-6">
            <label for="gender">Gender</label>
            <input name="gender" class="form-control" id="gender" value="{{$user->gender}}" disabled>
                
              
         </div><hr><br><br>

{{--          
         <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
    </div>

    @if (Storage::disk('local')->has($user->name.'-'.$user->id.'.jpg' ))
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
        
           
        </div>
    </section>
        
    @endif --}}

    

@endsection