<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home')->with('posts',$posts)->with('user',$user);
    }
    
    
    
    
    public function postCreatePost(Request $request)
    {
         //validation
         $this->validate($request, [
            'body' => 'required|max:1000',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('cover_image')) {

            // Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        
                //get file name with the extension
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
        
                //filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
                //upload image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
                
            }
                else
                {
                    $fileNameToStore = '';
                }
        
        
        
        
        
        
       
        $post = new Post();
        $post->body = $request['body'];
        //$request->user()->post()->save($post);
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $message = 'There was an error';
        if ( $post->save()) {
            $message = 'Post Successfully Created!';
        }
        return redirect('/home')->with(['message' => $message]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        //OR
        //$post=where('id',$id)->first();

         if (auth()->user()->id !== $post->user_id) {
            
             return redirect('/home')->with('error','Why you want delete post wey no be your own na !!');

            
         }

         if($post->cover_image != ''){
            //delete image
            Storage::delete(['public/cover_images/', $post->cover_image]);
        }
    
    
    
        $post->delete();
        return redirect('/home')->with('message','Post Deleted');
    
    
}

public function postEdit(Request $request)
{
    $this->validate($request, [
        'body' =>'required'

    ]);
    $post = Post::find($request['postId']);
    $post->body = $request['body'];
    $post->update();
    return response()->json(['new_body' => $post->body],200);
}

public function postLikePost(Request $request)
{
    $post_id = $request['postId'];
    $is_like = $request['isLike'] === 'true' ;
    $update = false;
    $post = Post::find($post_id);
    if(!$post){
        return null;
    }
    $user = auth()->user();
    $like = $user->likes()->where('post_id',$post_id)->first();
    if ($like){
        $already_like = $like->like;
        $update = true;
        if ($already_like == $is_like){
            $like->delete();
            return null;
        }}
    
        else{
            $like = new like();

        }
        
    $like->like = $is_like;
    //$like->user_id =  auth()->user()->id;
    $like->user_id =  $user->id;
    $like->post_id = $post->id;
    if ($update) {
        $like->update();
    }else{
        $like->save();
    }
    return null;
    }


}

