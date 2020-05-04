<?php

declare(strict_types=1);

namespace App\Entity;

class Showroom implements EntityInterface {
    use IdTrait;

    private string $name;

    private array $cars = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id;

        $this->name = $name;
    }

    public function addCar(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function getCars(): array
    {
        return $this->cars;
    }
}