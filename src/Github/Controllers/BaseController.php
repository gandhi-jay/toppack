<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 11/21/18
 * Time: 3:31 PM
 */

namespace Github\Controller;

use Interop\Container\ContainerInterface;

class BaseController
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
}