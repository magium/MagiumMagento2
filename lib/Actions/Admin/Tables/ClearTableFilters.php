<?php

namespace Magium\Magento2\Actions\Admin\Tables;

use Facebook\WebDriver\WebDriverBy;

class ClearTableFilters extends \Magium\Magento\Actions\Admin\Tables\ClearTableFilters
{

    public function clear()
    {
        while ($elements = $this->webDriver->findElements(WebDriverBy::xpath('//ul[@data-role="filter-list"]/descendant::button'))) {
            $element = array_shift($elements);
            $element->click();
        }
    }

}
