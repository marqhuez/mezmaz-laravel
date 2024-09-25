<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MoveItemEvent extends Model
{
    use HasFactory;

    protected $fillable = ['order_item_id', 'from_tank_id', 'to_tank_id'];

    public function from(): HasOne {
        return $this->hasOne(Tank::class, 'id', 'from_tank_id');
    }

    public function to(): HasOne {
        return $this->hasOne(Tank::class, 'id', 'to_tank_id');
    }

    public function item(): HasOne {
        return $this->hasOne(OrderItem::class);
    }
}
