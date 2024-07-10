<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy
{
    public function view(User $user, User $targetUser): bool
    {
        return $user->hasPermissionTo('can view product', 'api') || $user->getKey() === $targetUser->getKey();
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('can create product', 'api');
    }

    public function update(User $user, User $target): bool
    {
        return $user->getKey() === $target->getKey() || $user->hasPermissionTo('can update user', 'api');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('can delete product', 'api');
    }
}
