<?php

namespace Tests\Magium\Magento2\Customer;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Customer\Logout;
use Magium\Magento\Actions\Customer\Register;
use Magium\Magento\Navigators\Customer\Account;
use Magium\Magento2\ConfigurationSwitcher;

class RegisterCustomerTest extends \Tests\Magium\Magento\Customer\RegisterCustomerTest
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}