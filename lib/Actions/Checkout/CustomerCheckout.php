<?php

namespace Magium\Magento2\Actions\Checkout;

use Magium\Magento2\Actions\Checkout\Steps\BillingAddress;
use Magium\Magento2\Actions\Checkout\Steps\LogInCustomer;
use Magium\Magento2\Actions\Checkout\Steps\PaymentMethod;
use Magium\Magento\Actions\Checkout\Steps\PlaceOrder;
use Magium\Magento\Actions\Checkout\Steps\SelectGuestCheckout;
use Magium\Magento2\Actions\Checkout\Steps\ContinueButton;
use Magium\Magento2\Actions\Checkout\Steps\ShippingAddress;
use Magium\Magento2\Actions\Checkout\Steps\ShippingMethod;
use Magium\Magento\Extractors\Checkout\CartSummary;
use Magium\Magento2\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Checkout\CheckoutStart;
use Magium\Magento\Themes\OnePageCheckout\AbstractThemeConfiguration;
use Magium\Magento2\Actions\Checkout\Steps\EnterEmailAddress;
use Magium\Magento2\Actions\Checkout\Steps\WaitForLoadingMask;

use Magium\Magento\Actions\Checkout\CustomerCheckout as Magento1CustomerCheckout;

class CustomerCheckout extends Magento1CustomerCheckout
{
    public function __construct(
        CheckoutStart $navigator,
        AbstractThemeConfiguration $theme,
        LogInCustomer $logInCustomer,
        BillingAddress $billingAddress,
        ShippingAddress $shippingAddress,
        ShippingMethod $shippingMethod,
        PaymentMethod $paymentMethod,
        CartSummary $cartSummary,
        PlaceOrder $placeOrder,
        OrderId $orderIdExtractor,
        WaitForLoadingMask $loadingMask,
        ContinueButton $continueButton
    )
    {
        $this->addStep($navigator);
        $this->addStep($loadingMask);
        $this->addStep($logInCustomer);
        $this->addStep($shippingAddress);
        $this->addStep($loadingMask);
        $this->addStep($shippingMethod);
        $this->addStep($continueButton);
        $this->addStep($loadingMask);
        $this->addStep($paymentMethod);
        $this->addStep($billingAddress);
        $this->addStep($cartSummary);
        $this->addStep($placeOrder);
        $this->addStep($orderIdExtractor);

    }

}