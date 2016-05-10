<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Identities\Customer;
use Magium\Magento\Themes\OnePageCheckout\AbstractThemeConfiguration;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class LogInCustomer extends \Magium\Magento\Actions\Checkout\Steps\LogInCustomer
{
    protected $loading;

    public function __construct(
        WebDriver $webdriver,
        AbstractThemeConfiguration $theme,
        AbstractMagentoTestCase $testCase,
        Customer $customer,
        WaitForLoadingMask $loadingMask
    )
    {
        parent::__construct($webdriver, $theme, $testCase, $customer);
        $this->loading = $loadingMask;
    }


    public function execute()
    {

        if (!$this->webdriver->elementExists($this->theme->getCustomerEmailInputXpath(), WebDriver::BY_XPATH)) {
            return true; // We're already logged in
        }


        $emailInput = $this->webdriver->byXpath($this->theme->getCustomerEmailInputXpath());
        $emailInput->sendKeys($this->customer->getEmailAddress());

        // Trigger blur, possibly not necessary, but might help to trigger the event
        $this->webdriver->byXpath('//body')->click();

        $this->webdriver->wait(3)->until(
            ExpectedCondition::elementExists(
                $this->theme->getCustomerPasswordInputXpath(),
                WebDriver::BY_XPATH
            )
        );

        $passwordInput = $this->webdriver->byXpath($this->theme->getCustomerPasswordInputXpath());
        $this->webdriver->wait(3)->until(
            ExpectedCondition::visibilityOf(
                $passwordInput
            )
        );

        $passwordInput = $this->webdriver->byXpath($this->theme->getCustomerPasswordInputXpath());
        $passwordInput->sendKeys($this->customer->getPassword());

        return true;
    }

    public function nextAction()
    {
        $body = $this->webdriver->byXpath('//body');
        $button = $this->webdriver->byXpath($this->theme->getCustomerButtonXpath());
        $button->click();

        $this->webdriver->wait()->until(ExpectedCondition::elementRemoved($body));
        $this->loading->execute();

        return true;
    }
}