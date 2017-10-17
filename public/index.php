<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application;
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/../app/container-definitions.php');

$app = new Application($containerBuilder->build());
$app->register(gethostname());
$app->run();