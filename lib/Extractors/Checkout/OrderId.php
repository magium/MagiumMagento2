<?php

namespace Magium\Magento2\Extractors\Checkout;

use Magium\AbstractTestCase;
use Magium\Magento\Extractors\Checkout\OrderId as Magento1OrderId;
use Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration;
use Magium\Themes\ThemeConfigurationInterface;
use Magium\WebDriver\WebDriver;

class OrderId extends Magento1OrderId
{
    protected $checkoutTheme;

    public function __construct(
        WebDriver $webDriver,
        AbstractTestCase $testCase,
        ThemeConfigurationInterface $theme,
        ThemeConfiguration $themeConfiguration
)
    {
        parent::__construct($webDriver, $testCase, $theme);
        $this->checkoutTheme = $themeConfiguration;
    }


    public function execute()
    {
        $theme = $this->checkoutTheme;
        if ($theme instanceof ThemeConfiguration) {
            // This makes me uncomfortable because there's the possibility, I suppose, that this could change in some
            // way.  However, because the guest and customer order ID message is different I don't see any other way
            // much better than this.
            $element = $this->webDriver->byXpath($theme->getOrderReceivedCompleteXpath());
            $text = $element->getText();
            $matches = 0;
            if (preg_match('/(\d{3,})/', $text, $matches)) {
                $this->values['order-id'] = $matches[1];
            }
        }

    }

}