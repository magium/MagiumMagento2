<?php

namespace Magium\Magento2\Navigators\Admin;

use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class Order extends \Magium\Magento\Navigators\Admin\Order
{

    public function navigateTo($orderId, $doLoginIfNeeded = false)
    {
        if ($doLoginIfNeeded) {
            $this->adminLogin->login();
        }
        $this->adminMenuNavigator->navigateTo('Sales/Orders');

        $this->waitForLoadingMask->execute();
        $this->clearTableFilters->clear();
        $this->waitForLoadingMask->execute();

        $this->webDriver->byXpath('//button[@data-action="grid-filter-expand"]')->click();

        $element = $this->webDriver->byXpath('//input[@name="increment_id"]');

        $element->sendKeys($orderId);

        $this->clickButton->click($this->themeConfiguration->getSearchButtonText());
        $this->testCase->sleep('100ms');
        $this->waitForLoadingMask->execute();

        $selectXpath = $this->themeConfiguration->getSelectOrderXpath($orderId);

        $this->testCase->assertElementDisplayed($selectXpath, WebDriver::BY_XPATH);
        $element = $this->webDriver->byXpath($selectXpath);

        $element->click();

        $this->webDriver->wait()->until(ExpectedCondition::titleContains($orderId));

    }

}
