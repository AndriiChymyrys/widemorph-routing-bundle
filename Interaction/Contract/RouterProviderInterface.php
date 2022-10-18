<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract;

use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouterProviderInterface
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract
 */
interface RouterProviderInterface
{
    /** @var string */
    public const SERVICE_TAG_NAME = 'morph.router.provider';

    /**
     * @return RouteCollection
     */
    public function getRouteCollection(): RouteCollection;
}
