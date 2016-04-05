<?php

namespace Tests\Magium\Magento2\Action;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddConfigurableProductToCart;
use Magium\Magento\Navigators\BaseMenu;
use Magium\Magento\Navigators\Cart\Cart;
use Magium\Magento\Navigators\Catalog\DefaultConfigurableProduct;
use Magium\Magento\Navigators\Catalog\DefaultConfigurableProductCategory;
use Magium\Magento\Navigators\Catalog\Product;
use Magium\Magento2\ConfigurationSwitcher;
use Magium\WebDriver\WebDriver;

class AddConfigurableProductToCartTest extends \Tests\Magium\Magento\Action\AddConfigurableProductToCartTest
{

    protected $redElementTestXpath = '//dl[@class="item-options"]/dd[contains(., "Red")]';
    protected $mediumElementTestXpath = '//dl[@class="item-options"]/dd[contains(., "M")]';
    protected $qtySelector = '.item-info input.qty';

    protected $option1Name = 'color';
    protected $option1Value = 'red';

    protected $option2Name = 'size';
    protected $option2Value = 'm';

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

}