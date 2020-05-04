<?php

declare(strict_types=1);

namespace App\Entity;

class CarModel implements EntityInterface {
    use IdTrait;

    private string $name;
    private CarBrand $brand;

    public function __construct(int $id, CarBrand $brand, string $name)
    {
        $this->id = $id;

        $this->brand = $brand;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBrand(): CarBrand
    {
        return $this->brand;
    }
}