<?php

namespace Tests\Magium\Magento2\Action;

use Magium\Magento2\ConfigurationSwitcher;

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
        $switcher = $this->get(ConfigurationSwitcher::class);
        $switcher->configure();
    }

}
