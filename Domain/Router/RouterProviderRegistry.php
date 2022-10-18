<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router;

use Symfony\Component\Routing\RouteCollection;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract\RouterProviderInterface;

/**
 * Class RouterProviderRegistry
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router
 */
class RouterProviderRegistry implements RouterProviderRegistryInterface
{
    /**
     * @var RouterProviderInterface[]
     */
    protected array $providers = [];

    /**
     * @var RouteCollection
     */
    protected RouteCollection $routeCollection;

    /**
     * {@inheritDoc}
     */
    public function addProvider(RouterProviderInterface $routerProvider): void
    {
        $this->providers[] = $routerProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoutes(): RouteCollection
    {
        if (!isset($this->routeCollection)) {
            $this->routeCollection = new RouteCollection();

            foreach ($this->providers as $provider) {
                $this->routeCollection->addCollection($provider->getRouteCollection());
            }
        }

        return $this->routeCollection;
    }
}
