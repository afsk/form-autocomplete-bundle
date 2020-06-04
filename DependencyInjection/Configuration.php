<?php

namespace Zitec\FormAutocompleteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Defines the structure of the bundle configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('zitec_form_autocomplete');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('zitec_form_autocomplete');
        }

        $rootNode
            ->children()
                ->scalarNode('autocomplete_path_prefix')
                    ->defaultValue('autocomplete')
                    ->cannotBeEmpty()
                ->end()

                ->integerNode('suggestions_limit')
                    ->defaultValue(100)
                    ->min(1)
                ->end()
            ->end();

        return $treeBuilder;
    }
}
