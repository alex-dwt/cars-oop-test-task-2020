<?php

declare(strict_types=1);

namespace Tests\Integration\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

final class ClientBuyCarWithoutTradeinCommandTest extends TestCase
{
    public function testClientBuyCarWithoutTradeinCommandSuccess(): void
    {
        $application = new Application();
        $application->add(new \App\Command\ClientBuyCarWithoutTradeinCommand());

        $command = $application->find('app:client-buy-car-without-tradein');
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);

        $this->assertEquals(0, $commandTester->getStatusCode());
    }
}