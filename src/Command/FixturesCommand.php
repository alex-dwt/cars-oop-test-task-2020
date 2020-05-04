<?php

declare(strict_types=1);

namespace App\Command;

use App\Fixtures;
use App\Repository\CarBrandRepository;
use App\Repository\CarModelRepository;
use App\Repository\CarRepository;
use App\Repository\CustomerRepository;
use App\Repository\ManufacturerRepository;
use App\Repository\ShowroomRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixturesCommand extends Command
{
    protected static $defaultName = 'app:fixtures';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        (new Fixtures())->generateFixtures();

        $output->writeln('CarBrandRepository items count: ' . CarBrandRepository::getInstance()->getItemsCount());
        $output->writeln('CarModelRepository items count: ' . CarModelRepository::getInstance()->getItemsCount());
        $output->writeln('CarRepository items count: ' . CarRepository::getInstance()->getItemsCount());
        $output->writeln('CustomerRepository items count: ' . CustomerRepository::getInstance()->getItemsCount());
        $output->writeln('ManufacturerRepository items count: ' . ManufacturerRepository::getInstance()->getItemsCount());
        $output->writeln('ShowroomRepository items count: ' . ShowroomRepository::getInstance()->getItemsCount());

        return 0;
    }
}