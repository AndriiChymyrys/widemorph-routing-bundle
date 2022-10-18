<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction;

use WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router\RouterProviderRegistryInterface;

/**
 * Class DomainInteraction
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction
 */
class DomainInteraction implements DomainInteractionInterface
{
    /**
     * @param RouterProviderRegistryInterface $routerProviderRegistry
     */
    public function __construct(
        protected RouterProviderRegistryInterface $routerProviderRegistry
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getRouterProviderRegistry(): RouterProviderRegistryInterface
    {
        return $this->routerProviderRegistry;
    }
}
