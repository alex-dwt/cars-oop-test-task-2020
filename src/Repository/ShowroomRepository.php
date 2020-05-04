<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Showroom;

class ShowroomRepository {
    use RepositoryTrait;

    public function addShowroom(Showroom $entity): void
    {
        $this->addItem($entity);
    }

    public function getShowroom(int $id): ?Showroom
    {
        return $this->getItem($id);
    }
}