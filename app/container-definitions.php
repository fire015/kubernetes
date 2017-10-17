<?php

use function DI\factory;
use function DI\get;
use function DI\object;

return [
    App\Redis::class => object()
        ->constructorParameter('connection', 'tcp://redis-service:6379'),
    App\View::class => object()
        ->constructorParameter('template', __DIR__ . '/../view/template.html')
];