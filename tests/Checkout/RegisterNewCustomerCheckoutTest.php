<?php

namespace Tests\Magium\Magento2\Checkout;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Checkout\RegisterNewCustomerCheckout;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento2\ConfigurationSwitcher;

class RegisterNewCustomerCheckoutTest extends \Tests\Magium\Magento\Checkout\RegisterNewCustomerCheckoutTest
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}