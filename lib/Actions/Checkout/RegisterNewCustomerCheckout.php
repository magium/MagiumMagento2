<?php

namespace Magium\Magento2\Actions\Checkout;

use Magium\Magento\Actions\Checkout\RegisterNewCustomerCheckout as M1Checkout;

use Magium\Magento\Actions\Checkout\Steps\NewCustomerPassword;
use Magium\Magento\Actions\Checkout\Steps\SelectRegisterNewCustomerCheckout;
use Magium\Magento2\Actions\Checkout\Steps\BillingAddress;
use Magium\Magento2\Actions\Checkout\Steps\CustomerBillingAddress;
use Magium\Magento2\Actions\Checkout\Steps\PaymentMethod;
use Magium\Magento\Actions\Checkout\Steps\PlaceOrder;
use Magium\Magento2\Actions\Checkout\Steps\ContinueButton;
use Magium\Magento2\Actions\Checkout\Steps\ShippingAddress;
use Magium\Magento2\Actions\Checkout\Steps\ShippingMethod;
use Magium\Magento\Extractors\Checkout\CartSummary;
use Magium\Magento2\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Checkout\CheckoutStart;
use Magium\Magento2\Actions\Checkout\Steps\WaitForLoadingMask;
use Magium\Magento2\Actions\Checkout\Steps\RegisterCustomer;
use Magium\Magento2\Themes\Magento2\ThemeConfiguration;

class RegisterNewCustomerCheckout extends M1Checkout
{


    public function __construct(
        CheckoutStart             $navigator,
        ThemeConfiguration    $theme,
        SelectRegisterNewCustomerCheckout           $registerNewCustomerCheckout,
        CustomerBillingAddress  $billingAddress,
        ShippingAddress         $shippingAddress,
        ShippingMethod          $shippingMethod,
        PaymentMethod           $paymentMethod,
        CartSummary             $cartSummary,
        PlaceOrder              $placeOrder,
        OrderId                 $orderIdExtractor,
        NewCustomerPassword     $newCustomerPassword,
        RegisterCustomer        $registerCustomer,
        WaitForLoadingMask $loadingMask,
        ContinueButton $continueButton
    )
    {
        $this->addStep($registerCustomer);
        $this->addStep($navigator);
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