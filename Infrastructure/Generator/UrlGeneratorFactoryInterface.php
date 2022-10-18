<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Generator;

/**
 * Class UrlGeneratorFactoryInterface
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Generator
 */
interface UrlGeneratorFactoryInterface
{
    /**
     * @return UrlGeneratorInterface
     */
    public function getGenerator(): UrlGeneratorInterface;
}
