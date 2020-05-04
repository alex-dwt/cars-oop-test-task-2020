<?php

declare(strict_types=1);

namespace App\Entity;

class Car implements EntityInterface {
    use IdTrait;

    private CarModel $model;
    private Manufacturer $manufacturer;
    private ?Showroom $showroom = null;

    public function __construct(CarModel $model, Manufacturer $manufacturer)
    {
        $this->id = rand(1, 99999); //todo

        $this->model = $model;
        $this->manufacturer = $manufacturer;
    }

    public function getModel(): CarModel
    {
        return $this->model;
    }

    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }

    public function setShowRoom(Showroom $showroom)
    {
        $this->showroom = $showroom;
    }

    public function getShowroom(): ?Showroom
    {
        return $this->showroom;
    }
}