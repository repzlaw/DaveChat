<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Acct;
use App\User;
use App\like;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AcctController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth()->user();
        $data = [
            'success'=>'Account Updated',
            'user'=>$user,
            'accts'=> acct::orderBy('created_at', 'desc')->get()
        ];
        return view('/myacct')->with($data);
        // $user = user::orderBy('updated_at','desc')->paginate(10);
        // return view('myacct')->with('user',$user);
        
        // $user = user::find($id)->get();
        // return view('/myacct')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //     $acct= new Acct();
    //     $acct->fname = $request['fname'];
    //     $acct->lname = $request['lname'];
    //     if ($request['oname']==null){

    //     }
    //     $acct->oname = $request['oname'];
    //     $acct->dob = $request['dob'];
    //     $acct->email = $request['email'];
    //     $acct->gender = $request['gender'];
    //     $acct->p_pix = $request['p_pix'];

    //    $user = Auth()->user();
    //    $file = $request->file('p_pix');
    //    $filename = $request['fname'] .'-'.$user->id.'.jpg';
       
    //    if ($file) {
    //        Storage::disk('local')->put($filename, File::get($file));
    //    }
       
       
    //     $acct->save();

    //     $data = [
    //         'success'=>'Account Updated',
    //         'user'=>$user
    //     ];

    //     return view('/myacct')->with('success','Account Updated')->with('user',$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = user::find($id);
       // $post = $request->route('id');
        $post = $id;
        // end(Request::segments(3));
        //$posts = Post::orderBy('created_at', 'desc')->get();;
        return view('idacct')->with('user',$user)->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validation
         $this->validate($request, [
           // 'body' => 'required|max:1000',
            'p_pix' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('p_pix')) {

            // Get filename with the extension
                $filenameWithExt = $request->file('p_pix')->getClientOriginalName();
        
                //get file name with the extension
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension = $request->file('p_pix')->getClientOriginalExtension();
        
                //filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
                //upload image
                $path = $request->file('p_pix')->storeAs('public/p_pixs', $fileNameToStore);
                
            }
            else {
                $user= Auth()->user();
                $fileNameToStore = $user->p_pix;
            }
               
        
        
         //create acct
         $acct = user::find($id);
         $acct->fname = $request['fname'];
        $acct->lname = $request['lname'];
        $acct->oname = $request['oname'];
        $acct->dob = $request['dob'];
        $acct->email = $request['email'];
        $acct->gender = $request['gender'];
        // if ($request->hasFile('p_pix')){
        //     if($acct->p_pix != 'noimage.jpg'){
        //         Storage::delete(['public/p_pixs/'. $acct->p_pix]);
        //     }

            $acct->p_pix = $fileNameToStore;
        //} 
    //     $acct->p_pix = $request['p_pix'];

       $user = Auth()->user();
    //    $file = $request->file('p_pix');
    //    $filename = $request['fname'] .'-'.$user->id.'.jpg';
       
    //    if ($file) {
    //        Storage::disk('local')->put($filename, File::get($file));
    //    }
       
         $acct->save(); 
         $data = [
            'success'=>'Account Updated',
            'user'=>$user,
            'accts'=> acct::orderBy('created_at', 'desc')->get()
        ];
         

        return  redirect('/store')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAcct()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('account', ['user'=>auth()->user()])->with('post',$posts);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
    
    public function account()
    {
        // $post = $posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth()->user();
        return view('myacct')->with('user',$user);
    }
    
    
    
}
