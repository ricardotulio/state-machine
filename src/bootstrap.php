<?php

require_once __DIR__ . '/../vendor/autoload.php';

$container = require_once __DIR__ . '/../config/container.php';
$app       = $container->get(Zend\Expressive\Application::class);
$app->run();
