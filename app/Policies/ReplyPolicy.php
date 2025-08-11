<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

   
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Reply $reply)
    {
        if($user->id === $reply->user_id) {
            return true;
         }

        if($user && $user->id === $reply->user->posts->contains('user_id', $user->id)) {
            return true;
         }

        // dd($reply->user->posts);
        

         return false;
    }

    public function report (User $user, Reply $reply)  {
        if($user->id === $reply->user_id ) {
            return false;
        };

        if($user->id === $reply->user->posts->contains('user_id', $user->id) ) {
                return false;
        }

        return true;
}


   
}
