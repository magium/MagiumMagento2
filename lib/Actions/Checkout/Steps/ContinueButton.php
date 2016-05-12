<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\Magento\Actions\Checkout\Steps\StepInterface;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\WebDriver\WebDriver;

class ContinueButton implements StepInterface
{

    protected $webDriver;
    protected $theme;
    protected $loadingMask;

    public function __construct(
        WebDriver $webDriver,
        ThemeConfiguration $themeConfiguration,
        WaitForLoadingMask $loadingMask
    )
    {
        $this->webDriver    = $webDriver;
        $this->theme        = $themeConfiguration;
        $this->loadingMask  = $loadingMask;
    }

    public function execute()
    {
        if ($this->webDriver->elementExists($this->theme->getOpcContinueButtonXpath(), WebDriver::BY_XPATH)) {
            $this->webDriver->byXpath($this->theme->getOpcContinueButtonXpath())->click();
        }
        return true;
    }

    public function nextAction()
    {
        return true;
    }

}