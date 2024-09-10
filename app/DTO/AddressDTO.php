<?php

namespace App\DTO;

class AddressDTO
{
    public function __construct(
        public string $postCode,
        public string $county,
        public string $city,
        public string $address,
        public string $lastName,
        public string $firstName
    ) {
    }
}
