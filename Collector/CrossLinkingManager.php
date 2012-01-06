<?php

namespace Highco\CrossLinkingBundle\Collector;

use Highco\CrossLinkingBundle\Collector\InterfaceCrossLinkingCollector;
use Highco\CrossLinkingBundle\Collector\Exception\NoCollectorSupportedException;

/**
 * CrossLinkingManager
 *
 * @package HighcoCrossLinkingBundle
 * @version 1.0.0
 * @author Stephane PY <py.stephane1(at)gmail.com>
 */
class CrossLinkingManager
{
    private $collectors = array();

    /**
     * __construct
     *
     * @param array $collectors
     * @return void
     */
    public function __construct(array $collectors = array())
    {
        foreach($collectors as $collector)
        {
            $this->addCollector($collector);
        }
    }

    /**
     * addCollector
     *
     * @param InterfaceCrossLinkingCollector $collectors
     */
    public function addCollector(InterfaceCrossLinkingCollector $collector)
    {
        $this->collectors[$collector->getName()] = $collector;
    }

    /**
     * collect
     *
     * @param mixed $data
     * @param array $options
     * @return void
     */
    public function collect($data, $options = array())
    {
        foreach($this->collectors as $collector)
        {
            if($collector->supports($data))
            {
                return $collector->collect($data);
            }
        }

        throw new NoCollectorSupportedException('There is no collector supported for data given');
    }
}
