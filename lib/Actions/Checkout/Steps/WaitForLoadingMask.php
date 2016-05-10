<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Facebook\WebDriver\Exception\TimeOutException;
use Magium\Magento\Actions\Checkout\Steps\StepInterface;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class WaitForLoadingMask implements StepInterface
{

    protected $webDriver;
    protected $theme;

    public function __construct(
        WebDriver           $webDriver,
        ThemeConfiguration  $themeConfiguration
    )
    {
        $this->webDriver        = $webDriver;
        $this->theme            = $themeConfiguration;
    }

    public function execute()
    {
        try {
            sleep(1);  // This arbitrary sleep is brought to you by conditions that are very difficult to predict.
            $this->webDriver->wait(2)->until(
                ExpectedCondition::elementExists(
                    $this->theme->getLoadingMaskXpath(),
                    WebDriver::BY_XPATH
                )
            );
            $element = $this->webDriver->byXpath($this->theme->getLoadingMaskXpath());
            // Magento 2 sometimes removes it from the DOM, sometimes changes the display type.
            $this->webDriver->wait()->until(
                ExpectedCondition::not(
                    ExpectedCondition::visibilityOf(
                        $element
                    )
                )
            );
        } catch (\Exception $e) {
            // Ignore.  If the element doesn't exist after 2 seconds that probably means that has already occurred
            // and we missed it, or that it existed and an invalid reference existed.  Either way, at this point
            // we don't care.
        }
        return true;
    }

    public function nextAction()
    {
        return true;
    }


}