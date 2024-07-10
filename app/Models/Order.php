<?php

namespace App\Models;

use App\Enum\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property User $user
 * @property Product $product
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity', 'status', 'expired_at',];

    protected $casts = [
        'status' => OrderStatusEnum::class,
        'expired_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
