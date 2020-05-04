<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CarModel;

class CarModelRepository {
    use RepositoryTrait;

    public function addCarModel(CarModel $entity): void
    {
        $this->addItem($entity);
    }

    public function getCarModel(int $id): ?CarModel
    {
        return $this->getItem($id);
    }
}