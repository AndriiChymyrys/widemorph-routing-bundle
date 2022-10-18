<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Bridge\Symfony;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Generator\ConfigurableRequirementsInterface;

interface UrlGeneratorInterfaceBridge extends UrlGeneratorInterface, ConfigurableRequirementsInterface
{
}
