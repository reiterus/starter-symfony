<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

if (file_exists(dirname(__DIR__).'/config/bootstrap.php')) {
    require dirname(__DIR__).'/config/bootstrap.php';
} elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

$console = sprintf('php "%s/../bin/console" --env=test', __DIR__);
passthru(sprintf('%s doctrine:database:create --if-not-exists', $console));
passthru(sprintf('%s doctrine:schema:drop --force', $console));
passthru(sprintf('%s doctrine:schema:update --force --complete', $console));
passthru(sprintf('%s doctrine:fixtures:load --no-interaction', $console));
