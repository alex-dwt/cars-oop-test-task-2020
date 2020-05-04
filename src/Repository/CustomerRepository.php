<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Customer;

class CustomerRepository {
    use RepositoryTrait;

    public function addCustomer(Customer $entity): void
    {
        $this->addItem($entity);
    }

    public function getCustomer(int $id): ?Customer
    {
        return $this->getItem($id);
    }
}