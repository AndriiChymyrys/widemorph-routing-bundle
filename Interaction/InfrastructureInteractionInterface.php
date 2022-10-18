<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction;

use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher\UrlMatcherInterface;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Generator\UrlGeneratorInterface;

/**
 * Class InfrastructureInteractionInterface
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction
 */
interface InfrastructureInteractionInterface
{
    /**
     * @return UrlGeneratorInterface
     */
    public function getUrlGenerator(): UrlGeneratorInterface;

    /**
     * @return UrlMatcherInterface
     */
    public function getUrlMatcher(): UrlMatcherInterface;
}
