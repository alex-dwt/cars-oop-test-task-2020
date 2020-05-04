<?php

declare(strict_types=1);

namespace App;

use App\Entity\CarBrand;
use App\Entity\CarModel;
use App\Entity\Customer;
use App\Entity\Manufacturer;
use App\Entity\Showroom;
use App\Repository\CarBrandRepository;
use App\Repository\CarModelRepository;
use App\Repository\ManufacturerRepository;
use App\Repository\ShowroomRepository;
use App\Service\CarProducer;
use App\Service\CarSellService;
use App\Service\ShowroomCarReservationService;

class Fixtures {
    const BRAND_AUDI = 'audi';
    const BRAND_BMW = 'bmw';

    const MODEL_AUDI_ALLROAD = 'allroad';
    const MODEL_AUDI_A4 = 'a4';
    const MODEL_BMW_X5 = 'x5';
    const MODEL_BMW_X6 = 'x6';

    public function generateFixtures(): void
    {
        // brands and models
        $brandId = 1;
        $modelId = 1;

        foreach ([
            self::BRAND_BMW => [self::MODEL_BMW_X5, self::MODEL_BMW_X6,],
            self::BRAND_AUDI => [self::MODEL_AUDI_ALLROAD, self::MODEL_AUDI_A4],
         ] as $brandName => $models
        ) {
            $brand = new CarBrand($brandId++, $brandName);
            CarBrandRepository::getInstance()->addCarBrand($brand);

            foreach ($models as $modelName) {
                $model = new CarModel($modelId++, $brand, $modelName);
                CarModelRepository::getInstance()->addCarModel($model);
            }
        }

        // manufactures
        $manufacturer = new Manufacturer(1, 'manufacturer-1');
        ManufacturerRepository::getInstance()->addManufacturer($manufacturer);

        // showrooms
        for ($i = 1; $i <= 2; $i++) {
            $showroom = new Showroom($i, "showroom-$i");
            ShowroomRepository::getInstance()->addShowroom($showroom);
        }

        // produce all cars x2 times
        $cars = [];
        $carProducerService = new CarProducer();
        for ($i = 1; $i <= 2; $i++) {
            $cars[] = $carProducerService->produceCar($manufacturer,  CarModelRepository::getInstance()->getCarModel(1));
            $cars[] = $carProducerService->produceCar($manufacturer,  CarModelRepository::getInstance()->getCarModel(2));
            $cars[] = $carProducerService->produceCar($manufacturer,  CarModelRepository::getInstance()->getCarModel(3));
            $cars[] = $carProducerService->produceCar($manufacturer,  CarModelRepository::getInstance()->getCarModel(4));
        }

        // every showroom has 4 cars for selling
        $showRoomReservationService = new ShowroomCarReservationService();
        $showroom = ShowroomRepository::getInstance()->getShowroom(1);
        $showRoomReservationService->reserveCar($showroom, $cars[0]);
        $showRoomReservationService->reserveCar($showroom, $cars[1]);
        $showRoomReservationService->reserveCar($showroom, $cars[2]);
        $showRoomReservationService->reserveCar($showroom, $cars[3]);

        $showroom = ShowroomRepository::getInstance()->getShowroom(2);
        $showRoomReservationService->reserveCar($showroom, $cars[4]);
        $showRoomReservationService->reserveCar($showroom, $cars[5]);
        $showRoomReservationService->reserveCar($showroom, $cars[6]);
        $showRoomReservationService->reserveCar($showroom, $cars[7]);

        // customers
        $customer1 = new Customer('Alex');
        $customer2 = new Customer('John');

        // customer buy some cars
        $carSellService = new CarSellService();
        $carSellService->sellCar($customer1, $cars[0]);
        $carSellService->sellCar($customer1, $cars[1]);
        $carSellService->sellCar($customer2, $cars[6]);
    }
}