<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\EntityInterface;

trait RepositoryTrait {
    private array $items = [];

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    protected function addItem(EntityInterface $entity): void
    {
        $this->items[$entity->getId()] = $entity;
    }

    protected function getItem(int $id)
    {
        return $this->items[$id] ?? null;
    }

    public function getItemsCount(): int
    {
        return count($this->items);
    }
}