<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction;

use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher\UrlMatcherInterface;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Generator\UrlGeneratorInterface;

/**
 * Class InfrastructureInteraction
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction
 */
class InfrastructureInteraction implements InfrastructureInteractionInterface
{
    /**
     * @param UrlGeneratorInterface $generator
     * @param UrlMatcherInterface $matcher
     */
    public function __construct(protected UrlGeneratorInterface $generator, protected UrlMatcherInterface $matcher)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlGenerator(): UrlGeneratorInterface
    {
        return $this->generator;
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlMatcher(): UrlMatcherInterface
    {
        return $this->matcher;
    }
}
