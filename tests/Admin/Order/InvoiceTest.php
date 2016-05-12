<?php

namespace Tests\Magium\Magento2\Admin\Order;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Actions\Admin\Orders\Invoice;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Checkout\GuestCheckout;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Admin\Order;
use Magium\Magento2\ConfigurationSwitcher;

class InvoiceTest extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testOrderExtraction()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $addToCart = $this->getAction(AddItemToCart::ACTION);
        /* @var $addToCart \Magium\Magento\Actions\Cart\AddItemToCart */

        $addToCart->addSimpleProductToCartFromCategoryPage();
        $this->setPaymentMethod('CashOnDelivery');

        $guestCheckout = $this->getAction(GuestCheckout::ACTION);
        $guestCheckout->execute();

        $orderId = $this->getExtractor(OrderId::EXTRACTOR)->getOrderId();
        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(Order::NAVIGATOR)->navigateTo($orderId);
        $this->getAction(Invoice::ACTION)->execute();
    }

}