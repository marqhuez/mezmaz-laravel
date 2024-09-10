<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryAddress extends Model
{
    protected $fillable = ['post_code', 'city', 'address', 'county', 'last_name', 'first_name'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
