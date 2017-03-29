<?php

namespace Tests\Magium\Magento2\Checkout;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Cart\AddSimpleProductToCart;
use Magium\Magento\Actions\Checkout\GuestCheckout;
use Magium\Magento\Actions\Checkout\Steps\PlaceOrder;
use Magium\Magento\Actions\Checkout\Steps\StopProcessing;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProduct;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento2\Actions\Checkout\Steps\DiscountCode;
use Magium\Magento2\ConfigurationSwitcher;
use Magium\WebDriver\WebDriver;

class DiscountCodeTest extends AbstractMagentoTestCase
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
        $checkout = $this->getAction(GuestCheckout::ACTION);
        /* @var $checkout GuestCheckout */
        $discount = $this->getAction(DiscountCode::ACTION);
        /* @var $discount DiscountCode */
        $discount->setDiscountCode('abc123');
        $checkout->addStep($discount, $this->getAction(PlaceOrder::ACTION));
        $checkout->addStep($this->getAction(StopProcessing::ACTION), $this->getAction(PlaceOrder::ACTION));
        $checkout->execute();

        $this->assertElementExists('//div[@data-ui-id="checkout-cart-validationmessages-message-error"]', WebDriver::BY_XPATH);

    }


}
