@extends('layouts.app')

@section('title')
    Account
@endsection

@section('content')
    <div class="container">
        <h2>Fill your Account Details</h2>
    <form action="/store/{{$user->id}}" method="post" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type ="hidden" name="_method" value="put">

        <img  src="/storage/p_pixs/{{$user->p_pix}}" class="img-responsive">  


        {{-- <img src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id .'.jpg' ]) }}" class="img-responsive"> --}}

        <input type="file" name="p_pix" value="{{$user->p_pix}}">
        <p>Upload Profile Picture</p>
        
        
        
        
        <div class="col-md-6">
            <label for="fname"> First  Name</label>

            <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}">
         </div>
        
         <div class="col-md-6">
        <label for="lname">Last  Name</label>

        <input type="text" class="form-control" id="lname" name="lname" value="{{$user->lname}}">
         </div><hr><br><br><br>
         <div class="col-md-6">
        <label for="oname">Other  Name</label>

        <input type="text" class="form-control" id="oname" name="oname" value="{{$user->oname}}">
         </div>
         <div class="col-md-6">
        <label for="dob">Date Of Birth</label>

        <input type="date" class="form-control" id="dob" name="dob" value="{{$user->dob}}">
         </div><hr><br><br>
         <div class="col-md-6">
        <label for="email">Email</label>

        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
         </div>
        
         <div class="col-md-6">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" id="gender" value="{{$user->gender}}">
                <option value="{{$user->gender}}" selected>{{$user->gender}}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
               
              </select>
              
         </div><hr><br><br>

         <button class="btn btn-primary">Update Account</button>
         <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
    </div>

    @if (Storage::disk('local')->has($user->name.'-'.$user->id.'.jpg' ))
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
        
           
        </div>
    </section>
        
    @endif

@endsection