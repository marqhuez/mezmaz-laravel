<?php

namespace App\DTO;

class CustomerDTO
{
    public function __construct(
        public string $phoneNumber,
        public string $email,
        public bool $deliveryForBillingAddress,
        public AddressDTO $billingAddress,
        public AddressDTO $deliveryAddress
    ) {
    }
}
