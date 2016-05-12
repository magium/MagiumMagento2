<?php

namespace Tests\Magium\Magento2\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Configuration\Enabler;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento2\ConfigurationSwitcher;

class SaveSystemConfigurationSettingTest extends AbstractMagentoTestCase
{

    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testEnabler()
    {
        $adminThemeConfiguration = $this->getTheme('Admin\ThemeConfiguration');
            /* @var $adminThemeConfiguration \Magium\Magento\Themes\Admin\ThemeConfiguration */

        $this->getAction(Login::ACTION)->login();
        $enabler = $this->getAction(Enabler::ACTION);
        /** @var $enabler \Magium\Magento\Actions\Admin\Configuration\Enabler */

        $enabler->disable('Payment Methods/Saved CC');
        $settingXpath = $adminThemeConfiguration->getSystemConfigToggleEnableXpath('Saved CC', 0); // Note the 0
        $element = $this->webdriver->byXpath($settingXpath);
        self::assertNotNull($element->getAttribute('selected'));

        $enabler->enable('Payment Methods/Saved CC');

        $settingXpath = $adminThemeConfiguration->getSystemConfigToggleEnableXpath('Saved CC', 1); // Note the 1
        $element = $this->webdriver->byXpath($settingXpath);
        self::assertNotNull($element->getAttribute('selected'));


        $enabler->disable('Payment Methods/Saved CC');

        $settingXpath = $adminThemeConfiguration->getSystemConfigToggleEnableXpath('Saved CC', 0); // Note the 0
        $element = $this->webdriver->byXpath($settingXpath);
        self::assertNotNull($element->getAttribute('selected'));

    }




    
}