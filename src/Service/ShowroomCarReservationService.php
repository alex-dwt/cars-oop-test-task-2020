<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Car;
use App\Entity\Showroom;

class ShowroomCarReservationService {
    public function reserveCar(Showroom $showroom, Car $car): void
    {
        $showroom->addCar($car);
        $car->setShowRoom($showroom);
    }
}