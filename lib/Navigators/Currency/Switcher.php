<?php

namespace Magium\Magento2\Navigators\Currency;

use Magium\AbstractTestCase;
use Magium\Actions\WaitForPageLoaded;
use Magium\Magento\Themes\AbstractThemeConfiguration;
use Magium\Magento2\Themes\Magento2\ThemeConfiguration;
use Magium\Navigators\InstructionNavigator;
use Magium\WebDriver\WebDriver;

class Switcher extends InstructionNavigator
{

    const NAVIGATOR = 'Currency\Switcher';

    protected $themeConfiguration;

    public function __construct(AbstractTestCase $testCase, WebDriver $webdriver, WaitForPageLoaded $loaded, ThemeConfiguration $themeConfiguration)
    {
        parent::__construct($testCase, $webdriver, $loaded);
        $this->themeConfiguration = $themeConfiguration;
    }


    public function switchTo($currency)
    {
        $this->navigateTo($this->themeConfiguration->getCurrencySwitcherInstructionsXpath($currency));
        $this->loaded->execute();
    }
}