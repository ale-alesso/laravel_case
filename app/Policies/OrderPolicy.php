<?php

namespace App\Policies;

use App\Enum\OrderStatusEnum;
use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function get(User $user, Order $order): bool
    {
        return $user->getKey() === $order->user_id || $this->getListForAdmin($user);
    }

    public function process(User $user, Order $order): bool
    {
        return $user->getKey() === $order->user_id && $order->status === OrderStatusEnum::PENDING;
    }

    public function cancel(User $user, Order $order): bool
    {
        return $user->getKey() === $order->user_id && in_array($order->status->value, OrderStatusEnum::unpaidStatuses());
    }
}
