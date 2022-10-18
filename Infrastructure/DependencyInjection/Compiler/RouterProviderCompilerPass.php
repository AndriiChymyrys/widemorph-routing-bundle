<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Domain\Router\RouterProviderRegistry;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract\RouterProviderInterface;

/**
 * Class RouterProviderCompilerPass
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\DependencyInjection\Compiler
 */
class RouterProviderCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $routerRegistry = $container->getDefinition(RouterProviderRegistry::class);

        foreach ($container->findTaggedServiceIds(RouterProviderInterface::SERVICE_TAG_NAME) as $key => $attr) {
            $routerRegistry->addMethodCall('addProvider', [$container->getDefinition($key)]);
        }
    }
}
