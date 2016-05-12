<?php

namespace Magium\Magento2\Navigators\Customer;

use Magium\Actions\WaitForPageLoaded;
use Magium\InvalidConfigurationException;
use Magium\Magento2\Themes\Magento2\ThemeConfiguration;
use Magium\Navigators\InstructionNavigator;
use Magium\WebDriver\WebDriver;

class AccountHome extends \Magium\Magento\Navigators\Customer\AccountHome
{
    protected $webDriver;

    public function __construct(
        ThemeConfiguration $theme,
        InstructionNavigator $instructionsNavigator,
        WaitForPageLoaded $loaded,
        WebDriver $webDriver
    )
    {
        parent::__construct($theme, $instructionsNavigator, $loaded);
        $this->webDriver = $webDriver;
    }


    public function navigateTo()
    {
        if ($this->theme instanceof ThemeConfiguration) {
            $instructions = $this->theme->getNavigateToLoggedInCustomerPageInstructions();
            $testElementXpath = $instructions[0][1];
            if ($this->webDriver->elementExists($testElementXpath, WebDriver::BY_XPATH)) {
                $this->instructionsNavigator->navigateTo($instructions);
                return;
            }
        } else {
            throw new InvalidConfigurationException('The Magento 2 AccountHome navigator needs the Magento 2 ThemeConfiguration class.  Got: ' . get_class($this->theme));
        }
        parent::navigateTo();
    }


}