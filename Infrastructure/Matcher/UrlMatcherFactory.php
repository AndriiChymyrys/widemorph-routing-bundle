<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher;

use Symfony\Component\Routing\RequestContext;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\DomainInteractionInterface;

/**
 * Class UrlMatcherFactory
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher
 */
class UrlMatcherFactory implements UrlMatcherFactoryInterface
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
    public function getMatcher(): UrlMatcherInterface
    {
        return new UrlMatcher(
            $this->domainInteraction->getRouterProviderRegistry()->getRoutes(),
            $this->requestContext
        );
    }
}
