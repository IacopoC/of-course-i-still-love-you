<?php

namespace App\Policies;

use App\Models\Updown;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UpdownPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Updown  $updown
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function update(User $user, Updown $updown)
    {
        return $updown->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Updown  $updown
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function delete(User $user, Updown $updown)
    {
        return $this->update($user, $updown);
    }
}
