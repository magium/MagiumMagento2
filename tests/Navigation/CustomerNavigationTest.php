<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Customer\NavigateAndLogin;
use Magium\Magento\Navigators\Customer\Account;
use Magium\Magento2\ConfigurationSwitcher;
use Magium\WebDriver\WebDriver;

class CustomerNavigationTest extends \Tests\Magium\Magento\Navigation\CustomerNavigationTest
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}