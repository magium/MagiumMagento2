<?php

namespace Tests\Magium\Magento2\Admin\Order;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Actions\Admin\Orders\Cancel;
use Magium\Magento\Actions\Admin\Orders\Invoice;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Checkout\GuestCheckout;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Admin\Order;
use Magium\Magento2\ConfigurationSwitcher;

class CancelTest extends \Tests\Magium\Magento\Admin\Order\CancelTest
{

    protected function setUp()
    {
        parent::setUp();
        $this->get(ConfigurationSwitcher::class)->configure();
    }

}
