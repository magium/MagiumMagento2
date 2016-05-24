<?php

namespace Magium\Magento2;

use Magium\Magento\AbstractMagentoTestCase;

abstract class AbstractMagento2TestCase extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }
}