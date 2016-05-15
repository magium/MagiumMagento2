<?php

namespace Magium\Magento2\Actions\Checkout;

use Magium\Magento\Actions\Checkout\RegisterNewCustomerCheckout as M1Checkout;
use Magium\Magento\Actions\Checkout\Steps\NewCustomerPassword;
use Magium\Magento\Actions\Checkout\Steps\PaymentMethod;
use Magium\Magento\Actions\Checkout\Steps\PlaceOrder;
use Magium\Magento\Actions\Checkout\Steps\SelectRegisterNewCustomerCheckout;
use Magium\Magento\Actions\Checkout\Steps\ShippingAddress;
use Magium\Magento\Actions\Checkout\Steps\ShippingMethod;
use Magium\Magento\Extractors\Checkout\CartSummary;
use Magium\Magento\Extractors\Checkout\OrderId;
use Magium\Magento\Navigators\Checkout\CheckoutStart;
use Magium\Magento2\Actions\Checkout\Steps\CustomerBillingAddress;
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
        NewCustomerPassword     $newCustomerPassword
    )
    {
        $this->addStep($navigator);
        $this->addStep($registerNewCustomerCheckout);
        $this->addStep($newCustomerPassword);
        $this->addStep($billingAddress);
        $this->addStep($shippingAddress);
        $this->addStep($shippingMethod);
        $this->addStep($paymentMethod);
        $this->addStep($cartSummary);
        $this->addStep($placeOrder);
        $this->addStep($orderIdExtractor);

    }

}