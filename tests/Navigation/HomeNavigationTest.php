<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento2\ConfigurationSwitcher;
use Magium\Navigators\Home;

class HomeNavigationTest extends \Tests\Magium\Magento\Navigation\HomeNavigationTest
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}