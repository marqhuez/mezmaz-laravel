<?php

namespace App\Services;

use App\DTO\AddressDTO;
use App\Models\Customer;

class CustomerService
{
    public function getAll()
    {
        return Customer::all();
    }

    public function saveNewCustomer(
        string $email, string $phoneNumber, AddressDTO $billingAddress, AddressDTO $deliveryAddress
    ) {
        $customer = Customer::create(['email' => $email, 'phone_number' => $phoneNumber]);

        $customer->billingAddress()->create(
            [
                'post_code' => $billingAddress->postCode,
                'county' => $billingAddress->county,
                'city' => $billingAddress->city,
                'address' => $billingAddress->address,
                'last_name' => $billingAddress->lastName,
                'first_name' => $billingAddress->firstName
            ]
        );

        $customer->deliveryAddress()->create(
            [
                'post_code' => $deliveryAddress->postCode,
                'county' => $deliveryAddress->county,
                'city' => $deliveryAddress->city,
                'address' => $deliveryAddress->address,
                'last_name' => $deliveryAddress->lastName,
                'first_name' => $deliveryAddress->firstName
            ]
        );
    }
}
