<?php

namespace Tests\Magium\Magento2\Customer;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Customer\Login;
use Magium\Magento\Actions\Customer\NavigateAndLogin;
use Magium\Magento\Navigators\Customer\AccountHome;
use Magium\Magento2\ConfigurationSwitcher;

class ToCustomerLoginTest extends \Tests\Magium\Magento\Customer\ToCustomerLoginTest
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    protected $pageHeader = 'Customer Login';

}