<?php

namespace Tests\Magium\Magento2\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Navigators\Admin\AdminMenu;
use Magium\Magento2\ConfigurationSwitcher;

class AdminNavigationTest extends \Tests\Magium\Magento\Admin\AdminNavigationTest
{

    protected $navigateTo = 'Stores/Configuration';
    protected $expectedTitle = 'Configuration / Settings / Stores / Magento Admin';


    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }


}