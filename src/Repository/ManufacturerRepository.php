<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Manufacturer;

class ManufacturerRepository {
    use RepositoryTrait;

    public function addManufacturer(Manufacturer $entity): void
    {
        $this->addItem($entity);
    }

    public function getManufacturer(int $id): ?Manufacturer
    {
        return $this->getItem($id);
    }
}