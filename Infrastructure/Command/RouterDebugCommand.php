<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphRoutingBundle\Infrastructure\Command;

use JsonException;
use Symfony\Component\Routing\Route;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\DomainInteractionInterface;

#[AsCommand(
    name: 'morph:router:debug',
    description: 'Debug Morph dynamic routes'
)]
class RouterDebugCommand extends Command
{
    /**
     * @param DomainInteractionInterface $domainInteraction
     */
    public function __construct(protected DomainInteractionInterface $domainInteraction)
    {
        parent::__construct();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws JsonException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $routingRegistry = $this->domainInteraction->getRouterProviderRegistry();

        $io = new SymfonyStyle($input, $output);

        foreach ($routingRegistry->getProviders() as $provider) {
            $io->info(sprintf('Routes from "%s" provider', get_class($provider)));

            $headers = ['Name', 'Defaults'];
            $rows = [];
            /** @var Route $route */
            foreach ($provider->getRouteCollection() as $name => $route) {
                $rows[] = [$name, $this->formatDefaults($route->getDefaults())];
            }

            $io->table($headers, $rows);
        }

        return Command::SUCCESS;
    }

    /**
     * @param array<string, mixed> $defaults
     *
     * @return string
     *
     * @throws JsonException
     */
    protected function formatDefaults(array $defaults): string
    {
        $rows = [];

        foreach ($defaults as $name => $value) {
            $value = match (true) {
                is_object($value) => get_class($value),
                is_array($value) => json_encode($value, JSON_THROW_ON_ERROR),
                default => $value,
            };

            $rows[] = sprintf('%s => %s', $name, $value);
        }

        return implode(PHP_EOL, $rows);
    }
}
