<?php

declare(strict_types=1);

namespace App\Command;

use App\Fixtures;
use App\Repository\CarModelRepository;
use App\Repository\ManufacturerRepository;
use App\Repository\ShowroomRepository;
use App\Service\ShowroomManufacturerCarOrderService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClientBuyCarWithoutTradeinCommand extends Command
{
    protected static $defaultName = 'app:client-buy-car-without-tradein';

    protected function configure()
    {
        //todo showroomId
        //todo manufacturerId
        //todo carModelId

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        (new Fixtures())->generateFixtures();

        $orderService = new ShowroomManufacturerCarOrderService();
        $orderId = $orderService->orderCar(
            ShowroomRepository::getInstance()->getShowroom(1),
            ManufacturerRepository::getInstance()->getManufacturer(1),
            CarModelRepository::getInstance()->getCarModel(1)
        );

        $output->writeln('Order created successfully, id: ' . $orderId);

        return 0;
    }
}