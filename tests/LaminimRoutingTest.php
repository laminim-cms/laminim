<?php

namespace tests;

use LaminimCMS\Config\LaminimRouting;
use PHPUnit\Framework\TestCase;

class LaminimRoutingTest extends TestCase
{
    public function test_001_configRoute()
    {
        $path = 'test-dada';
        LaminimRouting::getInstance()->setCMSRoutePath($path);
        $this->assertEquals($path, LaminimRouting::getInstance()->getCMSRoutePath());
    }
}