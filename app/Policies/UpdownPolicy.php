<?php

namespace App\Policies;

use App\Models\Updown;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UpdownPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Updown $updown)
    {
        return $updown->user()->is($user);
    }

    public function delete(User $user, Updown $updown)
    {
        return $this->update($user, $updown);
    }
}
