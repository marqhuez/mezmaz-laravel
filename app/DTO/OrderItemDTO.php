<?php

namespace App\DTO;

class OrderItemDTO
{
    public function __construct(
        public int $ownWaxAmount,
        public string $combType,
        public string $combSize,
        public string $combAmount
    ) {
    }
}
