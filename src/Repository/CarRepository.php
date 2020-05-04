<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Car;

class CarRepository {
    use RepositoryTrait;

    public function addCar(Car $entity): void
    {
        $this->addItem($entity);
    }

    public function getCar(int $id): ?Car
    {
        return $this->getItem($id);
    }
}