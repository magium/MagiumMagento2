<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\Store\Switcher;

class StoreSwitcherNavigationTest extends \Tests\Magium\Magento\Navigation\StoreSwitcherNavigationTest
{

    public function testStoreSwitcherNavigation()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $element = $this->webdriver->byXpath('//body');
        $this->getNavigator(Switcher::NAVIGATOR)->switchTo('german');

        self::assertFalse($this->webdriver->elementAttached($element));
    }

}