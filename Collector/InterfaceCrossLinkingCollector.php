<?php

namespace Highco\CrossLinkingBundle\Collector;

/**
 * CrossLinkingCollector
 *
 * @package HighcoCrossLinkingBundle
 * @version 1.0.0
 * @author Stephane PY <py.stephane1(at)gmail.com>
 */
interface InterfaceCrossLinkingCollector
{
    public function getName();
    public function supports($data);
    public function collect($data, array $options = array());
}
