<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 11/21/18
 * Time: 6:48 PM
 */

namespace Github\Controllers\Search;

use Interop\Container\ContainerInterface;

use Slim\Http\Request;
use Slim\Http\Response;

class SearchController {

    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->logger = $container->get('logger');
    }

    /**
     * Show calls Github API and get's repositories by giving parameters.
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function show(Request $request, Response $response, array $args) {
        $this->logger->info("This API is in progress");
        return $response;
    }
}