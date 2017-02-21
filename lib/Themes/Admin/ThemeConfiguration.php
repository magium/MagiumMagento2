<?php

namespace Magium\Magento2\Themes\Admin;

class ThemeConfiguration extends \Magium\Magento\Themes\Admin\ThemeConfiguration
{
    const THEME = 'Magium\Magento2\Themes\Admin\ThemeConfiguration';

    public $loginSubmitButton = '//button[contains(concat(" ",normalize-space(@class)," ")," action-login ")]';

    public $adminPopupMessageContainerXpath = '//aside[contains(concat(" ", @class, " "), " modal-system-messages ")]';

    public $adminPopupMessageCloseButtonXpath = '//aside[contains(concat(" ", @class, " "), " modal-system-messages ")]/descendant::button[@data-role="closeBtn"]';

    public $cacheNavigationPath = '{{System}}/{{Cache Management}}';

    public $guaranteedPageLoadedElementDisplayedXpath = '//footer[@class="page-footer"]';

    public $tableButtonXpath = '//div[@data-part="filter-form"]/descendant::button/span[.="%s"]';

    public $searchButtonText = 'Apply Filters';

    public $selectOrderXpath = '//div[@class="data-grid-cell-content" and contains(concat(" ", ., " "), " %s ")]';

    public $loadingMaskXpath = '//div[@id="container"]/descendant::div[@data-role="spinner"]';

    public $widgetActionButtonXpath = '//div[contains(concat(" ", @class, " "), " page-actions-buttons ")]/button/span[concat(" ", normalize-space(.), " ") = " %s "]';

    public $orderCancelledMessageXpath = '//div[@id="messages"]/descendant::div[@data-ui-id="messages-message-success" and contains(., "{{You canceled the order}}")]';

}
