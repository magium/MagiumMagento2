<?php

namespace Magium\Magento2\Navigators\Admin;

use Facebook\WebDriver\WebDriverElement;

class AdminMenu extends \Magium\Magento\Navigators\Admin\AdminMenu
{

    public function execute(WebDriverElement $element)
    {
        $element->click();
    }
    
    public function pathAction($path, &$xpath)
    {
        parent::pathAction($path, $xpath);
        // We have it return null so that the base menu navigator will not attempt to click on it.
        return null;
    }

}