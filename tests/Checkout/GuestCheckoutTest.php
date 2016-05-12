<?php

namespace Tests\Magium\Magento2\Checkout;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Cart\AddSimpleProductToCart;
use Magium\Magento\Actions\Checkout\GuestCheckout;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProduct;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento2\ConfigurationSwitcher;

class GuestCheckoutTest extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testBasicCheckout()
    {
        $this->setPaymentMethod('CashOnDelivery');
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getNavigator(DefaultSimpleProductCategory::NAVIGATOR)->navigateTo();
        $this->getNavigator(DefaultSimpleProduct::NAVIGATOR)->navigateTo();
        $this->getAction(AddSimpleProductToCart::ACTION)->execute();
        $this->getAction(GuestCheckout::ACTION)->execute();

        $orderId = $this->getExtractor(OrderId::EXTRACTOR);
        /** @var $orderId OrderId */
        self::assertNotNull($orderId->getOrderId());
        self::assertGreaterThan(0, $orderId->getOrderId());
    }


}