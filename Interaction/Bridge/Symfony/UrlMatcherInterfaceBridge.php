<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Bridge\Symfony;

use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;

interface UrlMatcherInterfaceBridge extends UrlMatcherInterface, RequestMatcherInterface
{
}
