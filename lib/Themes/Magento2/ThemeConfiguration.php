<?php

namespace Magium\Magento2\Themes\Magento2;

use Magium\Magento\Themes\AbstractThemeConfiguration;
use Magium\Navigators\InstructionNavigator;

class ThemeConfiguration extends AbstractThemeConfiguration
{

    public $baseUrl = 'http://localhost';

    public $navigationBaseXPathSelector = '//nav';

    public $navigationChildXPathSelector = 'a[concat(" ",normalize-space(.)," ") = " %s "]/..';

    public $navigationPathToSimpleProductCategory = 'Gear/Bags';

    public $homeXpath = '//a[@class="logo"]';

    public $categorySpecificProductPageXpath    = '//*[contains(concat(" ",normalize-space(@class)," ")," product-item-name ")]/descendant::a[concat(" ",normalize-space(.)," ")=" {{%s}} "]';

    public $navigateToCustomerPageInstructions  = [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::li[@class="authorization-link"]']
    ];

    public function getCustomerThemeClass()
    {
        return 'Magium\Magento2\Themes\Magento2\Customer\ThemeConfiguration';
    }

    public function getCheckoutThemeClass()
    {
        return 'Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration';
    }

}