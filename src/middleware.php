<?php
// Application middleware

use Slim\Http\Request;
use Slim\Http\Response;

// e.g: $app->add(new \Slim\Csrf\Guard);

// Permanently redirect path with trailing slash.

$app->add(function(Request $request, Response $response, callable $next){
    $uri = $request->getUri();
    $path = $uri->getPath();

    if ($path !== '/' && substr($path, -1) == '/') {
        // Permanently redirect paths with trailing /
        $uri = $uri->withPath(substr($path, 0, -1));
        if($request->getMethod() == 'GET') {
            return $response->withRedirect((string)$uri, 301);
        } else {
            return $next($request->withUri($uri), $response);
        }
    }
    return $next($request, $response);
});