<?php

namespace Magium\Magento2\Themes\Admin;

class ThemeConfiguration extends \Magium\Magento\Themes\Admin\ThemeConfiguration
{
    const THEME = 'Magium\Magento2\Themes\Admin\ThemeConfiguration';

    public $loginSubmitButton = '//button[contains(concat(" ",normalize-space(@class)," ")," action-login ")]';

    public $adminPopupMessageContainerXpath = '//div[contains(concat(" ",normalize-space(@class)," ")," popup ")]/descendant::div[contains(concat(" ",normalize-space(@class)," ")," popup-content ")]';

    public $adminPopupMessageCloseButtonXpath = '//div[contains(concat(" ",normalize-space(@class)," ")," popup ")]/descendant::span[contains(concat(" ",normalize-space(@class)," ")," close ")]';

    public $cacheNavigationPath = '{{System}}/{{Cache Management}}';

    public $guaranteedPageLoadedElementDisplayedXpath = '//footer[@class="page-footer"]';
}