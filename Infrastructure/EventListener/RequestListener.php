<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Matcher\UrlMatcherInterface;

/**
 * Class RequestListener
 *
 * @package WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\EventListener
 */
class RequestListener
{
    /**
     * @param UrlMatcherInterface $matcher
     */
    public function __construct(protected UrlMatcherInterface $matcher)
    {
    }

    /**
     * @param RequestEvent $event
     *
     * @return void
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        try {
            $parameters = $this->matcher->matchRequest($request);
            $this->addAttributes($request, $parameters);
        } catch (NoConfigurationException|ResourceNotFoundException) {
            // allow request proceed to next listener
            return;
        }
    }

    /**
     * @param Request $request
     * @param array $parameters
     *
     * @return void
     */
    protected function addAttributes(Request $request, array $parameters): void
    {
        foreach ($parameters as $parameter => $value) {
            $request->attributes->set($parameter, $value);
        }
    }
}
