<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\WebDriver\WebDriver;

class ShippingAddress extends \Magium\Magento\Actions\Checkout\Steps\ShippingAddress
{
    protected $saveAddress = false;

    public function saveAddress($save = true)
    {
        $this->saveAddress = $save;
    }

    protected function preExecute()
    {
        if ($this->enterNewAddress) {
            if ($this->webdriver->elementExists($this->theme->getShippingNewAddressXpath(), WebDriver::BY_XPATH)) {
                $element = $this->webdriver->byXpath($this->theme->getShippingNewAddressXpath());
                $element->click();
            }
            return false;
        }
        $addressElement = $this->webdriver->byXpath($this->theme->getShippingAddressXpath());
        // This is an indication that there already exists a shipping address.
        if (!$addressElement->isDisplayed()) {
            return true;
        }
        return false;
    }

    public function nextAction()
    {
        if ($this->enterNewAddress) {
            // We are probably in the popup... I hope...
            $checked = $this->webdriver->byXpath($this->theme->getSaveInAddressBookToggleXpath())->getAttribute('checked') != null;
            if (($this->saveAddress && !$checked) || (!$this->saveAddress && $checked)) {
                $this->webdriver->byXpath($this->theme->getSaveInAddressBookToggleXpath())->click();
            }
            $this->webdriver->byXpath($this->theme->getSaveShippingAddressButtonXpath())->click();
        } else {
            // Force a blur event
            $this->webdriver->byXpath('//body')->click();
        }
        return true;
    }

}