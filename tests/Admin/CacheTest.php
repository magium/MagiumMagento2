<?php

namespace Tests\Magium\Magento2\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Cache\DisableCache;
use Magium\Magento\Actions\Admin\Cache\EnableCache;
use Magium\Magento\Actions\Admin\Cache\RefreshCache;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento2\ConfigurationSwitcher;
use Magium\WebDriver\WebDriver;

class CacheTest extends \Tests\Magium\Magento\Admin\CacheTest
{


    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    protected function assertElementValue($type, $value)
    {
        // Leave this in the M2 test class
        $xpath = sprintf('//input[@name="types" and @value="%s"]/../../../td/descendant::span[.="%s"]', $type, $value);
        $this->assertElementExists($xpath, WebDriver::BY_XPATH);
    }

}