<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\DependencyInjection\MorphRoutingExtension;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\DependencyInjection\Compiler\RouterProviderCompilerPass;

/**
 * Class MorphRoutingBundle
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle
 */
class MorphRoutingBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new RouterProviderCompilerPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new MorphRoutingExtension();
    }
}
