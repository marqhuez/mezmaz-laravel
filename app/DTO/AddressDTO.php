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

    public static function fromArray(array $array) {
        return new self(
            $array['postCode'] ?? '',
            $array['county'] ?? '',
            $array['city'] ?? '',
            $array['address'] ?? '',
            $array['lastName'] ?? '',
            $array['firstName'] ?? ''
        );
    }
}
