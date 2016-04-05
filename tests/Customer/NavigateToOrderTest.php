<?php

namespace Tests\Magium\Magento2\Customer;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Checkout\CustomerCheckout;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Customer\AccountHome;
use\Magium\Magento\Navigators\Customer\NavigateToOrder;
use Magium\Magento2\ConfigurationSwitcher;

class NavigateToOrderTest extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testCreateAndNavigateToOrder()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getAction(AddItemToCart::ACTION)->addSimpleProductToCartFromCategoryPage();
        $this->setPaymentMethod('CashOnDelivery');
        $this->getAction(CustomerCheckout::ACTION)->execute();

        $orderId = $this->getExtractor(OrderId::EXTRACTOR)->getOrderId();

        $this->getNavigator(AccountHome::NAVIGATOR)->navigateTo();
        $this->getNavigator(NavigateToOrder::NAVIGATOR)->navigateTo($orderId);

        $this->assertPageHasText($this->getIdentity()->getBillingFirstName());
    }

}