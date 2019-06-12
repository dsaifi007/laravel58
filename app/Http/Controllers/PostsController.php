<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Auth;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1);
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
        //echo $request->file('file');die;
        
         $validatedData = $request->validate([
            'email' => 'required|min:10|max:255',
            'pwd' => 'required',
            'file'=>'required|file|mimes:jpeg,jpg,png'
            ]);
          $path = $request->file('file')->store('img');
         //echo $path."sss";die;
         return redirect('form')->withInput(
            $request->flash()
        );
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
        die;
        $respond = \Auth::guard('admin')->attempt(['email' =>'admin@gmail.com', 'password' => '12345678']);
        dump($respond);die;
        return retry(1, function () {
            echo "ss";
            // Attempt 5 times while resting 100ms in between attempts...
        }, 100);
    }
}
