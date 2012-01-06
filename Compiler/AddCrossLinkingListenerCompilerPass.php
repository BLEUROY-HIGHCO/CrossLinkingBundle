<?php

namespace Highco\CrossLinkingBundle\Compiler;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * AddCrossLinkingListenerCompilerPass
 *
 * @uses CompilerPassInterface
 * @package HighcoCrossLinkingBundle
 * @version 1.0.0
 * @author Stephane PY <py.stephane1(at)gmail.com>
 */
class AddCrossLinkingListenerCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        foreach($container->findTaggedServiceIds('highco.cross_linking.collector') as $id => $tags)
        {
            $container->getDefinition('highco.cross_linking.collector.manager')->addMethodCall('addCollector', array($container->getDefinition($id)));
        }
    }
}
