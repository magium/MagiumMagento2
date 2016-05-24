<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\Store\Switcher;
use Magium\Magento2\ConfigurationSwitcher;

class StoreSwitcherNavigationTest extends \Tests\Magium\Magento\Navigation\StoreSwitcherNavigationTest
{

    protected function setUp()
    {
        // Note, this requires adding a german store view to the default sample data.  Multiple currencies are
        // no longer managed via store view
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}