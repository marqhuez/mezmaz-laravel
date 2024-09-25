<?php

namespace App\Services;

use App\Models\Tank;

class TankService
{
    public function getAllTanks() {
        return Tank::all();
    }
}
