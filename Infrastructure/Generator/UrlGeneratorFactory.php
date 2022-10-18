<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Generator;

use Symfony\Component\Routing\RequestContext;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\DomainInteractionInterface;

/**
 * Class UrlGeneratorFactory
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Generator
 */
class UrlGeneratorFactory implements UrlGeneratorFactoryInterface
{
    /**
     * @param RequestContext $requestContext
     * @param DomainInteractionInterface $domainInteraction
     */
    public function __construct(
        protected RequestContext $requestContext,
        protected DomainInteractionInterface $domainInteraction
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getGenerator(): UrlGeneratorInterface
    {
        return new UrlGenerator(
            $this->domainInteraction->getRouterProviderRegistry()->getRoutes(),
            $this->requestContext
        );
    }
}
