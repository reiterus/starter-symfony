<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Cron Job Example.
 *
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
#[AsCommand(
    name: 'app:cron:fake',
    description: 'Cron job example',
)]
class CronFakeCommand extends Command
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger, string $name = null)
    {
        $this->logger = $logger;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger->info('Cron job example: app:cron:fake', [__METHOD__]);

        return Command::SUCCESS;
    }
}
