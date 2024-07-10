<?php

namespace App\Enum;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';

    public static function getAllValues(): array
    {
        return array_column(OrderStatusEnum::cases(), 'value');
    }

    public static function allowedStatusesTransition(string $status): array
    {
        //
    }
}
