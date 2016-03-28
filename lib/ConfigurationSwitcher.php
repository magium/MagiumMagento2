<?php

namespace Magium\Magento2;

use Magium\Magento\AbstractMagentoTestCase;

class ConfigurationSwitcher
{

    protected $testCase;

    public function __construct(
        AbstractMagentoTestCase $testCase
    )
    {
        $this->testCase = $testCase;
    }

    public function configure()
    {
        $this->testCase->switchThemeConfiguration('Magium\Magento2\Themes\Magento2\ThemeConfiguration');
    }

}