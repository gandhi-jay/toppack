<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/hello/[{name}]', function (Request $request, Response $response, array $args) {
    $this->logger->addInfo(var_export($args, true));
    $name = $args['name'];
    $response->getBody()->write("Hello, $name".PHP_EOL);

    return $response;
});
