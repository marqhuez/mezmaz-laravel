<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['own_wax_amount', 'comb_type', 'comb_size', 'comb_amount'];

    public function scopeUnassigned(Builder $query): void {
        $query->where('tank_id', null);
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function tank(): BelongsTo {
        return $this->belongsTo(Tank::class);
    }
}
