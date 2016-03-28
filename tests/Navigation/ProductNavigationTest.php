<?php

namespace Tests\Magium\Magento2\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento\Navigators\Catalog\Product;
use Magium\Magento2\ConfigurationSwitcher;

class ProductNavigationTest extends \Tests\Magium\Magento\Navigation\ProductNavigationTest
{

    protected $productName = 'Joust Duffle Bag';


    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}