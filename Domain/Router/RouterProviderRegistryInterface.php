<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router;

use Symfony\Component\Routing\RouteCollection;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract\RouterProviderInterface;

/**
 * Class RouterProviderRegistryInterface
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router
 */
interface RouterProviderRegistryInterface
{
    /**
     * @param RouterProviderInterface $routerProvider
     *
     * @return void
     */
    public function addProvider(RouterProviderInterface $routerProvider): void;

    /**
     * @return array
     */
    public function getProviders(): array;

    /**
     * @return RouteCollection
     */
    public function getRoutes(): RouteCollection;
}
