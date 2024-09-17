<?php

namespace App\DTO;

class OrderInfoDTO
{
    /** @param OrderItemDTO[] $orderItems */
    public function __construct(
        public string $comment,
        public string $secondaryPhoneNumber,
        public array $orderItems,
        public bool $isBio
    ) {
    }
}
