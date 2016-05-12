<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\Magento\Actions\Checkout\Steps\StepInterface;
use Magium\Magento\Identities\Customer;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\WebDriver\WebDriver;

class EnterEmailAddress implements StepInterface
{
    protected $identity;
    protected $theme;
    protected $webDriver;

    public function __construct(
        Customer            $identity,
        ThemeConfiguration  $themeConfiguration,
        WebDriver           $webDriver
    )
    {
        $this->identity     = $identity;
        $this->theme        = $themeConfiguration;
        $this->webDriver    = $webDriver;
    }

    public function execute()
    {

        $element = $this->webDriver->byXpath($this->theme->getCustomerEmailInputXpath());
        $element->clear();
        $element->sendKeys($this->identity->getEmailAddress());
        $this->webDriver->byXpath('//body')->click(); // attempt to force a blur to trigger the email Ajax
        return true;
    }

    public function nextAction()
    {
        return true;
    }


}