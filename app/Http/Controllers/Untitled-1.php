 //for update in acct controller
         //create post
         $acct = user::find($id);
         $acct->fname = $request['fname'];
        $acct->lname = $request['lname'];
        if ($request['oname']==null){

        }
        $acct->oname = $request['oname'];
        $acct->dob = $request['dob'];
        $acct->email = $request['email'];
        $acct->gender = $request['gender'];
        $acct->p_pix = $request['p_pix'];

       $user = Auth()->user();
       $file = $request->file('p_pix');
       $filename = $request['fname'] .'-'.$user->id.'.jpg';
       
       if ($file) {
           Storage::disk('local')->put($filename, File::get($file));
       }
       
         $acct->save(); 
         $data = [
            'success'=>'Account Updated',
            'user'=>$user,
            'posts'=> Post::orderBy('created_at', 'desc')->get()
        ];
         

        return  redirect('/store')->with($data);
    }