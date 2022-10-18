<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher;

/**
 * Class UrlMatcherFactoryInterface
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher
 */
interface UrlMatcherFactoryInterface
{
    /**
     * @return UrlMatcherInterface
     */
    public function getMatcher(): UrlMatcherInterface;
}
