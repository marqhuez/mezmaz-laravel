<?php

namespace App\Services;

use App\DTO\CustomerDTO;
use App\Models\Customer;

class CustomerService
{
    public function getAll() {
        return Customer::all();
    }

    public function getById(int $id) {
        return Customer::find($id);
    }

    public function saveNewCustomer(
        CustomerDTO $customerDTO
    ) {
        $customer = Customer::create(['email' => $customerDTO->email, 'phone_number' => $customerDTO->phoneNumber]);

        $customer->billingAddress()->create(
            [
                'post_code' => $customerDTO->billingAddress->postCode,
                'county' => $customerDTO->billingAddress->county,
                'city' => $customerDTO->billingAddress->city,
                'address' => $customerDTO->billingAddress->address,
                'last_name' => $customerDTO->billingAddress->lastName,
                'first_name' => $customerDTO->billingAddress->firstName
            ]
        );

        $customer->deliveryAddress()->create(
            [
                'post_code' => $customerDTO->deliveryAddress->postCode,
                'county' => $customerDTO->deliveryAddress->county,
                'city' => $customerDTO->deliveryAddress->city,
                'address' => $customerDTO->deliveryAddress->address,
                'last_name' => $customerDTO->deliveryAddress->lastName,
                'first_name' => $customerDTO->deliveryAddress->firstName
            ]
        );

        return $customer;
    }
}
