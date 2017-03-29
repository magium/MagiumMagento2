<?php

namespace Magium\Magento2\Actions\Checkout\Steps;

use Magium\InvalidConfigurationException;
use Magium\Magento\Actions\Checkout\Steps\StepInterface;
use Magium\Magento\Themes\OnePageCheckout\AbstractThemeConfiguration;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\Navigators\InstructionNavigator;
use Magium\WebDriver\WebDriver;

class DiscountCode implements StepInterface
{

    const ACTION = 'Checkout\Steps\DiscountCode';

    protected $webDriver;
    protected $theme;
    protected $navigator;
    protected $mask;
    protected $discountCode;

    public function __construct(
        WebDriver $webDriver,
        AbstractThemeConfiguration $theme,
        WaitForLoadingMask $mask,
        InstructionNavigator $navigator
    )
    {
        if (!$theme instanceof ThemeConfiguration) {
            throw new InvalidConfigurationException('Magento2 discount code step requires the Magento 2 theme configuration');
        }
        $this->webDriver = $webDriver;
        $this->theme = $theme;
        $this->navigator = $navigator;
        $this->mask = $mask;
    }

    public function setDiscountCode($code)
    {
        $this->discountCode = $code;
    }

    public function execute()
    {
        $this->navigator->navigateTo($this->theme->getDiscountCodeNavigationInstructions());
        $this->webDriver->byXpath($this->theme->getDiscountCodeTextBoxXpath())->sendKeys($this->discountCode);
        return true;
    }

    public function nextAction()
    {
        $this->webDriver->byXpath($this->theme->getDiscountCodeButtonXpath())->click();
        $this->mask->execute();
        return true;
    }

}
