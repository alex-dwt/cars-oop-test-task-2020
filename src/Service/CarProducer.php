<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Car;
use App\Entity\CarModel;
use App\Entity\Manufacturer;
use App\Repository\CarRepository;

class CarProducer {
    public function produceCar(Manufacturer $manufacturer, CarModel $model): Car
    {
        $car = new Car($model, $manufacturer);

        CarRepository::getInstance()->addCar($car);

        return $car;
    }
}