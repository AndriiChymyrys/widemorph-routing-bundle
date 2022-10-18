<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract\RouterProviderInterface;

/**
 * Class MorphRoutingExtension
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\DependencyInjection
 */
class MorphRoutingExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(RouterProviderInterface::class)
            ->addTag(RouterProviderInterface::SERVICE_TAG_NAME);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../Resources/config')
        );

        foreach (['domain.xml', 'interaction.xml', 'infrastructure.xml'] as $file) {
            $loader->load($file);
        }
    }
}
