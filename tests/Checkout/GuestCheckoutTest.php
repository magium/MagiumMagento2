<?php

namespace Tests\Magium\Magento2\Checkout;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Checkout\GuestCheckout;
use Magium\Magento\Extractors\Checkout\OrderId;
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
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());
        $addToCart = $this->getAction(AddItemToCart::ACTION);
        /* @var $addToCart \Magium\Magento\Actions\Cart\AddItemToCart */

        $addToCart->addSimpleProductToCartFromCategoryPage();

        $this->setPaymentMethod('CashOnDelivery');
        $guestCheckout = $this->getAction(GuestCheckout::ACTION);
        /* @var $guestCheckout \Magium\Magento\Actions\Checkout\GuestCheckout */

        $guestCheckout->execute();

        $orderId = $this->getExtractor(OrderId::EXTRACTOR);
        /** @var $orderId OrderId */
        self::assertNotNull($orderId->getOrderId());
        self::assertGreaterThan(0, $orderId->getOrderId());
    }


}