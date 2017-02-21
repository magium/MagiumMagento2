<?php

namespace Magium\Magento2\Actions\Admin\Orders;

use Magium\AbstractTestCase;
use Magium\Assertions\Xpath\Displayed;
use Magium\Magento\Actions\Admin\WaitForPageLoaded;
use Magium\Magento\Actions\Admin\Widget\ClickActionButton;
use Magium\Magento\Themes\Admin\ThemeConfiguration;
use Magium\Magento2\Actions\Admin\ConfirmDialog;
use Magium\WebDriver\WebDriver;

class Cancel extends \Magium\Magento\Actions\Admin\Orders\Cancel
{

    protected $confirmDialog;

    public function __construct(
        WebDriver $webDriver,
        ThemeConfiguration $themeConfiguration,
        ClickActionButton $actionButton,
        WaitForPageLoaded $loaded,
        AbstractTestCase $testCase,
        Displayed $displayed,
        ConfirmDialog $confirmDialog
    )
    {
        parent::__construct(
            $webDriver,
            $themeConfiguration,
            $actionButton,
            $loaded,
            $testCase,
            $displayed
        );
        $this->confirmDialog = $confirmDialog;
    }


    public function execute()
    {
        $body = $this->webDriver->byXpath('//body');
        $this->actionButton->click('Cancel');
        $this->confirmDialog->confirm();
        $this->loaded->execute($body);

        $xpath = $this->themeConfiguration->getOrderCancelledMessageXpath();
        $this->displayed->assertSelector($xpath);
    }

}
