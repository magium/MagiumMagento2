<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\InvalidConfigurationException;
use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Identities\Customer;
use Magium\Magento\Actions\Checkout\PaymentMethods\PaymentMethodInterface;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\WebDriver\WebDriver;

class CustomerBillingAddress extends \Magium\Magento\Actions\Checkout\Steps\CustomerBillingAddress
{

    const ACTION = __CLASS__;

    protected $paymentMethod;

    protected $clickUpdate = false;

    protected $saveAddress = false;

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

    public function saveAddress($save = true)
    {
        $this->saveAddress = $save;
    }

    protected function preExecute()
    {
        if ($this->shipToDifferentAddress || $this->enterNewAddress) {
            $theme = $this->theme;
            if ($theme instanceof ThemeConfiguration) {
                $paymentMethod = $this->paymentMethod;
                if ($paymentMethod instanceof \Magium\Magento\Actions\Checkout\PaymentMethods\PaymentMethodInterface) {
                    $xpath = $theme->getUseDifferentBillingAddressXpath($paymentMethod->getId());
                    $element = $this->webdriver->byXpath($xpath);
                    if ($element->getAttribute('checked') !== null) {
                        $element->click();
                        $xpath = $theme->getBillingNewAddressXpath();
                        $element = $this->webdriver->byXpath($xpath);
                        $element->click();
                        $this->clickUpdate = true;
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
        if ($this->clickUpdate) {
            $xpath = $this->theme->getBillingSaveAddressXpath();
            $element = $this->webdriver->byXpath($xpath);
            if ($this->saveAddress) {
                if ($element->getAttribute('checked') === null) {
                    $element->click();
                }
            } else {
                if ($element->getAttribute('checked') !== null) {
                    $element->click();
                }
            }

            $xpath = $this->theme->getBillingUpdateButtonXpath();
            $element = $this->webdriver->byXpath($xpath);
            $element->click();
        }
        return true;
    }

}