<?php

namespace Magium\Magento2\Actions\Checkout;

use Magium\Magento2\Actions\Checkout\Steps\BillingAddress;
use Magium\Magento2\Actions\Checkout\Steps\CustomerBillingAddress;
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

class GuestCheckout extends \Magium\Magento\Actions\Checkout\GuestCheckout
{
    
    public function __construct(
        CheckoutStart $navigator,
        AbstractThemeConfiguration $theme,
        SelectGuestCheckout $selectGuestCheckout,
        CustomerBillingAddress $billingAddress,
        ShippingAddress $shippingAddress,
        ShippingMethod $shippingMethod,
        PaymentMethod $paymentMethod,
        CartSummary $cartSummary,
        PlaceOrder $placeOrder,
        OrderId $orderIdExtractor,
        EnterEmailAddress $enterEmailAddress,
        WaitForLoadingMask $loadingMask,
        ContinueButton $continueButton
    )
    {
        $this->addStep($navigator);
        $this->addStep($loadingMask);
        $this->addStep($enterEmailAddress);
        $this->addStep($loadingMask);
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