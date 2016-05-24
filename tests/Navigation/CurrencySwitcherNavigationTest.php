<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento2\Navigators\Currency\Switcher;
use Magium\Magento2\AbstractMagento2TestCase;

class CurrencySwitcherNavigationTest extends AbstractMagento2TestCase
{

    public function testStoreSwitcherNavigation()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $element = $this->webdriver->byXpath('//body');
        $this->getNavigator(Switcher::NAVIGATOR)->switchTo('EUR');

        self::assertFalse($this->webdriver->elementAttached($element));
    }

}