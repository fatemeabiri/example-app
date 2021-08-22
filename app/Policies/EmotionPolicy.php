<?php

namespace App\Policies;

use App\Models\Emotion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class EmotionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Emotion  $emotion
     * @return mixed
     */
    public function view(User $user, Emotion $emotion)
    {
        //
        return Auth::check();

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Emotion  $emotion
     * @return mixed
     */
    public function update(User $user, Emotion $emotion)
    {
        //
        return($user->id==$emotion->user_id);

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Emotion  $emotion
     * @return mixed
     */
    public function delete(User $user, Emotion $emotion)
    {
        //
        return($user->id==$emotion->user_id);

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Emotion  $emotion
     * @return mixed
     */
    public function restore(User $user, Emotion $emotion)
    {
        //
        return($user->id==$emotion->user_id);

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Emotion  $emotion
     * @return mixed
     */
    public function forceDelete(User $user, Emotion $emotion)
    {
        //
        return($user->id==$emotion->user_id);

    }

//    public function update(User $user, Post $post)
//    {
//        return $user->id === $post->user_id
//            ? Response::allow()
//            : Response::deny('You do not own this post.');
//    }
//$response = Gate::inspect('update', $post);
//
//if ($response->allowed()) {
//    // The action is authorized...
//} else {
//    echo $response->message();
//}
}
