<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Navigators\Cart\Cart;
use Magium\Magento2\ConfigurationSwitcher;

class CartNavigationTest extends \Tests\Magium\Magento\Navigation\CartNavigationTest
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}