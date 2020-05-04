<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CarBrand;

class CarBrandRepository {
    use RepositoryTrait;

    public function addCarBrand(CarBrand $entity): void
    {
        $this->addItem($entity);
    }

    public function getCarBrand(int $id): ?CarBrand
    {
        return $this->getItem($id);
    }
}