<?php

namespace Tests\Magium\Magento2\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Actions\Admin\Tables\ClearTableFilters;
use Magium\Magento\Actions\Admin\WaitForLoadingMask;
use Magium\Magento\Navigators\Admin\AdminMenu;
use Magium\Magento2\ConfigurationSwitcher;

class TestClearTableFilters extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testFilterClearsSuccessfully()
    {

        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(AdminMenu::NAVIGATOR)->navigateTo('Sales/Orders');
        $this->webdriver->byId('sales_order_grid_filter_billing_name')->sendKeys('Kevin Schroeder');
        $this->webdriver->byXpath('//span[.="Search"]')->click();
        $this->getAction(WaitForLoadingMask::ACTION)->wait();

        $element = $this->webdriver->byId('sales_order_grid_filter_billing_name');
        self::assertEquals('Kevin Schroeder', $element->getAttribute('value'));

        // Actual test

        $this->getAction(ClearTableFilters::ACTION)->clear();


        $element = $this->webdriver->byId('sales_order_grid_filter_billing_name');
        self::assertEquals('', $element->getAttribute('value'));

    }

}