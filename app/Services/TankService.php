<?php

namespace App\Services;

use App\Models\Tank;

class TankService
{
    public function getAllTanks() {
        return Tank::all();
    }

    public function getById(int $id) {
        return Tank::find($id);
    }
}
