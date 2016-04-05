<?php

namespace Tests\Magium\Magento2\Action;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddSimpleProductToCart;
use Magium\Magento\Navigators\BaseMenu;
use Magium\Magento\Navigators\Cart\Cart;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProduct;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento\Navigators\Catalog\Product;
use Magium\Magento2\ConfigurationSwitcher;

class AddSimpleProductToCartTest extends \Tests\Magium\Magento\Action\AddSimpleProductToCartTest
{

    protected $qtySelector = '.item-info input.qty';


    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}