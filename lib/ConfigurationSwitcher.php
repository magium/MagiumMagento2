<?php

namespace Magium\Magento2;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento2\Themes\Magento2\ThemeConfiguration;

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
        
        $this->testCase->switchThemeConfiguration(ThemeConfiguration::class);
        
    }

}
