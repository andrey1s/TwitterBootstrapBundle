<?php
/**
 * @author Andrey <asamusev@archer-soft.com>
 * @copyright andrey 3/16/13
 *
 * @version 1.0.0
 */
namespace Twitter\BootstrapBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Twitter\BootstrapBundle\DependencyInjection\TwitterBootstrapExtension;
use Twitter\BootstrapBundle\Tests\TestCase;

class TwitterBootstrapExtensionTest extends TestCase
{
    public function testLoadEmptyConfiguration()
    {
        $container = $this->createContainer();
        $container->registerExtension(new TwitterBootstrapExtension());
        $container->loadFromExtension('twitter_bootstrap', array());
        $this->compileContainer($container);
    }

    private function createContainer()
    {
        $container = new ContainerBuilder(new ParameterBag(array(
            'kernel.cache_dir' => __DIR__,
            'kernel.root_dir' => __DIR__.'/Fixtures',
            'kernel.charset' => 'UTF-8',
            'kernel.debug' => false,
            'kernel.bundles' => array('TwitterBootstrapBundle' => 'Twitter\\BootstrapBundle\\TwitterBootstrapBundle'),
        )));

        return $container;
    }

    private function compileContainer(ContainerBuilder $container)
    {
        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->compile();
    }
}
