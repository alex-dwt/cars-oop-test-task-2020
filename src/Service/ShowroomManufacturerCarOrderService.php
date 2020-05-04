<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Car;
use App\Entity\CarModel;
use App\Entity\Manufacturer;
use App\Entity\Showroom;

class ShowroomManufacturerCarOrderService {
    public function orderCar(Showroom $showroom, Manufacturer $manufacturer, CarModel $carModel): int
    {
        // todo create Entity for ordering
        // todo save order to a manufacture and return orderId

        return rand(1, 666);
    }
}