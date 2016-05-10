<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Checkout\PaymentMethods\PaymentMethodInterface;
use Magium\Magento\Themes\OnePageCheckout\AbstractThemeConfiguration;
use Magium\WebDriver\WebDriver;

class PaymentMethod extends \Magium\Magento\Actions\Checkout\Steps\PaymentMethod
{
    public function __construct(
        WebDriver $webdriver,
        AbstractThemeConfiguration $theme,
        AbstractMagentoTestCase $testCase,
        PaymentMethodInterface $paymentMethod)
    {
        parent::__construct($webdriver, $theme, $testCase, $paymentMethod);
    }


    public function execute()
    {
        $this->paymentMethod->pay($this->requirePayment);
        return true;
    }

    public function nextAction()
    {
        return true;
    }

}