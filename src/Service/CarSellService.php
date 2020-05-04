<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Car;
use App\Entity\Customer;
use App\Entity\Purchase;

class CarSellService {
    public function sellCar(Customer $customer, Car $car): Purchase
    {
        $purchase = new Purchase($customer, $car);

        // todo any actions

        return $purchase;
    }
}