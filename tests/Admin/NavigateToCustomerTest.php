<?php

namespace Tests\Magium\Magento2\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Navigators\Admin\AdminMenu;
use Magium\Magento\Navigators\Admin\Customer;
use Magium\Magento2\ConfigurationSwitcher;

class NavigateToCustomerTest extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testNavigateToCustomerByPrimaryKey()
    {

        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(AdminMenu::NAVIGATOR)->navigateTo('Customers/Manage Customers');
        $searchXpath = '//table[@id="customerGrid_table"]/descendant::tr[3]/td[2]';
        $pk = trim($this->byXpath($searchXpath)->getText());

        $this->getNavigator(Customer::NAVIGATOR)->navigateTo(new Customer\ByPrimaryKey($pk));

    }

    public function testNavigateToCustomerByName()
    {

        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(AdminMenu::NAVIGATOR)->navigateTo('Customers/Manage Customers');
        $searchXpath = '//table[@id="customerGrid_table"]/descendant::tr[3]/td[3]';
        $name = trim($this->byXpath($searchXpath)->getText());

        $this->getNavigator(Customer::NAVIGATOR)->navigateTo(new Customer\ByName($name));

    }

    public function testNavigateToCustomerByEmail()
    {

        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(AdminMenu::NAVIGATOR)->navigateTo('Customers/Manage Customers');
        $searchXpath = '//table[@id="customerGrid_table"]/descendant::tr[3]/td[4]';
        $email = trim($this->byXpath($searchXpath)->getText());

        $this->getNavigator(Customer::NAVIGATOR)->navigateTo(new Customer\ByEmail($email));

    }

}