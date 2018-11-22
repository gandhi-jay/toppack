<?php

use Slim\Http\Request;
use Slim\Http\Response;

use Github\Controllers\Search\SearchController;

// Routes
$app->get('/hello/[{name}]', function (Request $request, Response $response, array $args): Response {
    $this->logger->info(var_export($args, true));
    $name = $args['name'];
    $response->getBody()->write("Hello, $name" . PHP_EOL);

    return $response;
});

//$app->get('/search/{input}', SearchController::class . ':show');//->setName('search.show');
$app->group('/api', function () {
    // Search routes
    $this->get('/search/{input}', SearchController::class . ':show');//->setName('search.show');
});