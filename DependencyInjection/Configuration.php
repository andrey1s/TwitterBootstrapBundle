<?php

namespace Twitter\BootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('twitter_bootstrap');

        $rootNode
            ->children()

                ->arrayNode('assets')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('stylesheets')
                        ->defaultValue(array(
                                'bundles/twitterbootstrap/css/bootstrap.min.css',
                                'bundles/twitterbootstrap/css/bootstrap-responsive.min.css',
                            ))
                        ->prototype('scalar')->end()
                    ->end()
                    ->arrayNode('javascripts')
                    ->defaultValue(array(
                            'bundles/twitterbootstrap/js/bootstrap.min.js',
                            '//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js',
                        ))
                    ->prototype('scalar')->end()
                    ->end()
                    ->end()
                ->end()

            ->end();

        return $treeBuilder;
    }
}
