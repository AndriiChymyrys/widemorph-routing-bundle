<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction;

use WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router\RouterProviderRegistryInterface;

/**
 * Class DomainInteractionInterface
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction
 */
interface DomainInteractionInterface
{
    /**
     * @return RouterProviderRegistryInterface
     */
    public function getRouterProviderRegistry(): RouterProviderRegistryInterface;
}
