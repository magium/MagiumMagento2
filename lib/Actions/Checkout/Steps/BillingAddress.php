<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\InvalidConfigurationException;
use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Identities\Customer;
use Magium\Magento\Actions\Checkout\PaymentMethods\PaymentMethodInterface;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\WebDriver\WebDriver;

class BillingAddress extends \Magium\Magento\Actions\Checkout\Steps\BillingAddress
{
    protected $paymentMethod;

    public function __construct(
        WebDriver $webdriver,
        ThemeConfiguration $theme,
        Customer $customerIdentity,
        AbstractMagentoTestCase $testCase,
        PaymentMethodInterface $paymentMethod
    )
    {
        parent::__construct($webdriver, $theme, $customerIdentity, $testCase);
        $this->paymentMethod = $paymentMethod;
    }


    protected function preExecute()
    {
        if ($this->shipToDifferentAddress) {
            $theme = $this->theme;
            if ($theme instanceof ThemeConfiguration) {
                $paymentMethod = $this->paymentMethod;
                if ($paymentMethod instanceof \Magium\Magento2\Actions\Checkout\PaymentMethods\PaymentMethodInterface) {
                    $xpath = $theme->getUseDifferentBillingAddressXpath($paymentMethod->getId());
                    $element = $this->webdriver->byXpath($xpath);
                    if ($element->getAttribute('selected') === null) {
                        $element->click();
                        return false;
                    }
                } else {
                    throw new InvalidConfigurationException('The billing address requires a payment method that implements Magium\Magento2\Themes\Magento2\Checkout\PaymentMethods\PaymentMethodInterface');
                }

            } else {
                throw new InvalidConfigurationException('The billing address requires a theme that is based off of Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration');
            }

        }
        return true;
    }

    public function nextAction()
    {
        return true;
    }

}