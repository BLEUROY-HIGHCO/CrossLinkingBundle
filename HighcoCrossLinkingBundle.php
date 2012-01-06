<?php

namespace Highco\CrossLinkingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Highco\CrossLinkingBundle\Compiler\AddCrossLinkingListenerCompilerPass;

class HighcoCrossLinkingBundle extends Bundle
{
    /**
     * build
     *
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new AddCrossLinkingListenerCompilerPass());
    }

}
