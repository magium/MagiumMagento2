<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento2\ConfigurationSwitcher;

class BaseNavigationTest extends \Tests\Magium\Magento\Navigation\BaseNavigationTest
{


    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}