<?php

namespace App\Policies;

use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Comments $comments)
    {
        //
    }

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
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Comments $comments)
    {
        return $user->id === $comments->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Comments $comments)
    {
         // return $user->id === $comments->user_id &&  $comments->posts->user_id;
         if($user->id === $comments->user_id) {
            return true;
         }

         if($user && $user->id === $comments->posts->user_id) {
             return true;
         }

         return false;
    }


    public function report (User $user, Comments $comments)  {
                if($user->id === $comments->user_id ) {
                    return false;
                };

                if($user->id === $comments->posts->user_id ) {
                        return false;
                }

                return true;
    }

   


}
