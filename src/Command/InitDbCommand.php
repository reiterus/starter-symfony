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

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\ExceptionInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Database initialization.
 *
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
#[AsCommand(
    name: 'app:init:db',
    description: 'Full database initialization',
)]
class InitDbCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        foreach ($this->items() as $name => $opts) {
            $command = $this->getApplication()->find($name);
            $greetInput = new ArrayInput($opts);
            $greetInput->setInteractive(false);

            try {
                $command->run($greetInput, $output);
            } catch (ExceptionInterface $e) {
                $io->error('EXCEPTION: '.$e->getMessage());
            }
        }

        $io->success('Successfully!');

        return Command::SUCCESS;
    }

    protected function items(): array
    {
        return [
            'doctrine:database:create' => ['--if-not-exists' => true],
            'doctrine:schema:drop' => ['--force' => true],
            'doctrine:schema:update' => ['--force' => true, '--complete' => true],
            'doctrine:migrations:sync-metadata-storage' => [],
            'doctrine:migrations:version' => ['--add' => true, '--all' => true],
            'doctrine:fixtures:load' => ['--no-interaction' => true],
        ];
    }
}
