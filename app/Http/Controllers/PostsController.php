<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Exception;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(5);
        echo $user->email;
        //$post  = Posts::find(1);
        //dd($user->user);
        //echo $user->email;
        foreach ($user->posts as $post) {
            echo $post->post_title."<br>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Posts $posts)
    {
        $this->authorize('view', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->all());die;
        
         $validatedData = $request->validate([
            'post_title' => 'required|min:10|max:255',
            'post_description' => 'required'
            ]);       
         //echo $request->input('post_title');die;
          \App\Post::create(['post_title' =>$request->input('post_title'),'post_description'=>$request->input('post_description'),'user_id'=>5]);

          //$path = $request->file('file')->store('img');
          //$obj = new Posts();
          //$obj->post_title = $request->input('post_title');
          //$obj->post_description = $request->input('post_description');
          //$obj->user_id = 5;
          //$obj->save();
         //echo $path."sss";die;
          return redirect('post')->with('added', 'Content has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $posts)
    {
        //
    }
    public function retry()
    {
        $fail = \Auth::guard('admin')->attempt(['email' =>'danish.khan@syncrasytech.com', 'password' => '12345678']);
        //dump($respond);die;
        return retry(1,function () use (&$fail) {
            if ($fail) {
                    $fail = false;
                    //throw new \Exception("Boom!");
                    abort(403);
                } else {
                    return "Woo!";
                }
            // Attempt 5 times while resting 100ms in between attempts...
        }, 100);
    }
}
