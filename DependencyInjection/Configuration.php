<?php

namespace A5sys\LoggedInRedirectionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Thomas BEAUJEAN
 */
class Configuration implements ConfigurationInterface
{
    /**
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('logged_in_redirection');

        $rootNode
        ->children()
            ->scalarNode('route_name')->isRequired()
            ->end()
            ->scalarNode('redirect_route_name')->isRequired()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
