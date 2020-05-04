<?php

declare(strict_types=1);

namespace App\Entity;

class Purchase implements EntityInterface {
    use IdTrait;

    private Customer $customer;
    private Car $car;
    private \DateTimeImmutable $purchaseDate;

    public function __construct(Customer $customer, Car $car)
    {
        $this->id = rand(1, 9999);

        $this->customer = $customer;
        $this->car = $car;

        $this->purchaseDate = new \DateTimeImmutable();
    }
}