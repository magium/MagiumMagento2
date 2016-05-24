<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\Magento\Actions\Checkout\Steps\StepInterface;
use Magium\Magento\Actions\Customer\Register;
use Magium\Magento\Identities\Customer;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\WebDriver\WebDriver;

class RegisterCustomer implements StepInterface
{

    protected $webDriver;
    protected $register;
    protected $customer;
    protected $loadingMask;

    public function __construct(
        WebDriver $webDriver,
        Register $register,
        Customer $customer,
        WaitForLoadingMask $loadingMask
    )
    {
        $this->webDriver    = $webDriver;
        $this->register     = $register;
        $this->loadingMask  = $loadingMask;
        $this->customer     = $customer;
    }

    public function execute()
    {

        if (!$this->customer->isUniqueEmailAddressGenerated()) {
            $this->customer->generateUniqueEmailAddress();
        }
        $this->register->register();
        return true;
    }

    public function nextAction()
    {
        return true;
    }

}