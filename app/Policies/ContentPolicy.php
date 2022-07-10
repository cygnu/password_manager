<?php

namespace App\Policies;

use App\Models\Content;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    use HandlesAuthorization;

    public function checkUser(User $user, Content $content)
    {
        if ($user->id === $content->user_id) {
            return true;
        }
    }
}
