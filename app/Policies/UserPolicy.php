<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function view(User $user, User $targetUser): bool
    {
        return $user->hasPermissionTo('can view user', 'api') || $user->getKey() === $targetUser->getKey();
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('can create user', 'api');
    }

    public function update(User $user, User $target): bool
    {
        return $user->getKey() === $target->getKey() || $user->hasPermissionTo('can update user', 'api');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('can delete user', 'api');
    }
}
