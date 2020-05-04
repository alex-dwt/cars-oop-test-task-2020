<?php

declare(strict_types=1);

namespace Tests\Unit\Service;

use App\Entity\Car;
use App\Entity\Showroom;
use App\Service\ShowroomCarReservationService;
use PHPUnit\Framework\TestCase;

final class ShowroomCarReservationServiceTest extends TestCase
{
    public function testShowroomCanReserveCarSuccess(): void
    {
        $showroomMock = $this->createMock(Showroom::class);
        $carMock = $this->createMock(Car::class);

        $showroomMock->expects($this->once())->method('addCar')->with($carMock);
        $carMock->expects($this->once())->method('setShowRoom')->with($showroomMock);

        $service = new ShowroomCarReservationService();
        $service->reserveCar($showroomMock, $carMock);
    }
}