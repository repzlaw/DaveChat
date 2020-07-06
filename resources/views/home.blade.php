@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row new-post">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 style="margin-left: 10%;">What do you have to say?</h2></div>

                {{-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    {{-- <section class="row new-post">
                        <div class="col-md-6 col-md-offset-6">

                        </div> --}}
<br><br>
                    <form action="{{ route('post.create')}}" method="post" class="form-group" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <textarea style="width: 80%; margin: auto;" name="body" id="new-post"  rows="5" class="form-control" placeholder="Say your thoughts ..."></textarea>
                            <br>
                            <input type="file" name="cover_image" id="" class="form-control"> <br>
                            <button style="margin-left: 10%;" type="submit" class="btn btn-primary" >Create Post</button>
                            {{-- <input type="hidden" value="{{session::token()}}" name="_token"> --}}
                        </form>
                        <hr>
                        
                        
                    {{-- </section> --}}
                    <section class="row posts" style="margin-left: 6%;" >
                        <div class="col-md-8 ">
                        <header><h3>What other people say ...</h3></header>
                       

                        @if (count($posts)>0)
                        @foreach ($posts as $post)
                        
                       
                            
                            
                        
                        
                        <article class="post" data-postid="{{ $post->id }}">

                            {{-- @if (auth::user() == $post->user) --}}
                            
                            {{-- <img  style="width:33%; border-radius: 8px; border:1px solid #ddd; padding:8px" 
                            src="/storage/p_pixs/{{$post->user->p_pix}}"> --}}
                            {{-- {{Auth::user()->p_pix }} --}}
                            {{-- @endif --}}
                            
                            <h4 ><a style="text-decoration: none;" href="/store/{{$post->user_id}}" ><img  src="/storage/p_pixs/{{$post->user->p_pix}}" class="articlepix">
                                 {{-- {{route('idaccount')}}  --}}
                                {{$post->user->fname}} {{$post->user->lname}}  </a> 
                                </h4>
                                <br> 
                                <span  data-postid="{{ $post->id }}">
                            <p>{{$post->body}}</p>
                            <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="imgp">
                            <br><br>
                            <div class="info">
                                posted by {{$post->user->name}} on {{$post->created_at}}
                            </div>
                            <div class="interaction">
                                <a href="#" class="like" >{{ Auth::user()->likes()->where('post_id',$post->id)
                                ->first() ? Auth::user()->likes()->where('post_id',$post->id)
                                ->first()->like == 1 ? 'Post Liked' : 'Like' :'Like' }}</a> |
                                <a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)
                                    ->first() ? Auth::user()->likes()->where('post_id',$post->id)
                                    ->first()->like == 0 ? ' Post Disliked' : 'Dislike' :'Dislike' }}</a> 


                                 @if (auth::user() == $post->user)
                                 | 
                                <a href="#" class="edit">Edit</a> |
                                <a href="{{route('post.delete',['id'=>$post->id])}}">Delete</a>
                                
                                 @endif 
                                

                            </div>
                            
                        </article>
                        @endforeach
                        @endif
                    </div>
                    
                    </section>
                        
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id= "edit-modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Post</h4>
        </div>
        <div class="modal-body">
          <form >
              <div class="form-group">
                  <label for="post-body">Edit Post</label>
                  <textarea name="post-body" id="post-body" rows="5" class="form-control" ></textarea>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id = "modal-save">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';
    </script>




@endsection
