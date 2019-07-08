<?php

namespace App\Policies;

use App\User;
use App\Posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Posts  $posts
     * @return mixed
     */
    public function view(User $user, Posts $posts)
    {
        dd($user);
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        
    }

    /**
     * Determine whether the user can update the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Posts  $posts
     * @return mixed
     */
    public function update(User $user, Posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can delete the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Posts  $posts
     * @return mixed
     */
    public function delete(User $user, Posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can restore the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Posts  $posts
     * @return mixed
     */
    public function restore(User $user, Posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Posts  $posts
     * @return mixed
     */
    public function forceDelete(User $user, Posts $posts)
    {
        //
    }
    public function u_post_access(User $user, Posts $posts)
    {
        echo $posts->user_id;
        dd($posts);
    }
}
