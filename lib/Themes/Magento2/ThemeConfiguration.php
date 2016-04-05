<?php

namespace Magium\Magento2\Themes\Magento2;

use Magium\AbstractTestCase;
use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Themes\AbstractThemeConfiguration;
use Magium\Navigators\InstructionNavigator;

class ThemeConfiguration extends AbstractThemeConfiguration
{

    public $baseUrl = 'http://localhost';

    public $navigationBaseXPathSelector = '//nav';

    public $navigationChildXPathSelector = 'a[concat(" ",normalize-space(.)," ") = " %s "]/..';

    public $homeXpath = '//a[@class="logo"]';

    public $categorySpecificProductPageXpath    = '//*[contains(concat(" ",normalize-space(@class)," ")," product-item-name ")]/descendant::a[concat(" ",normalize-space(.)," ")=" {{%s}} "]';

    public $navigateToCustomerPageInstructions  = [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::li[@class="authorization-link"]']
    ];

    public $navigateToLoggedInCustomerPageInstructions  = [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::li[contains(concat(" ",normalize-space(@class)," ")," customer-welcome ")]/descendant::span[contains(concat(" ",normalize-space(@class)," ")," customer-name ")]'],
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::div[contains(concat(" ",normalize-space(@class)," ")," customer-menu ")]/descendant::a[.="{{My Account}}"]']
    ];

    public $navigationPathToSimpleProductCategory = '{{Gear}}/{{Bags}}';

    public $defaultSimpleProductName = '{{Joust Duffle Bag}}';

    public $addToCartXpath  =   '//button[@title="{{Add to Cart}}" and contains(concat(" ",normalize-space(@class)," ")," tocart ")]';

    public $addToCartSuccessXpath   =    '//div[contains(concat(" ",normalize-space(@class)," ")," messages ")]/descendant::div[contains(concat(" ",normalize-space(@class)," ")," message ")]/descendant::div[contains(concat(" ",normalize-space(.))," {{You added}} ")]';

    public $simpleProductQtyXpath   =    '//input[@id="qty"]';

    public $navigationPathToConfigurableProductCategory =   '{{Men}}/{{Tops}}/{{Jackets}}';

    public $defaultConfigurableProductName = '{{Beaumont Summit Kit}}';

    public $cartNavigationInstructions  =    [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK, '//div[@data-block="minicart"]/a'],
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK, '//div[@id="minicart-content-wrapper"]/descendant::div[contains(concat(" ",normalize-space(@class)," ")," actions ")]/descendant::a[contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," viewcart ")]']
    ];

    public $logoutNavigationInstructions = [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::li[contains(concat(" ",normalize-space(@class)," ")," customer-welcome ")]/descendant::span[contains(concat(" ",normalize-space(@class)," ")," customer-name ")]'],
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::div[contains(concat(" ",normalize-space(@class)," ")," customer-menu ")]/descendant::a[concat(" ",normalize-space(.)," ")=" {{Sign Out}} "]']
    ];

    public $logoutSuccessXpath = '//h1[contains(concat(" ",normalize-space(@class)," ")," page-title ")]/descendant::span[concat(" ",normalize-space(.)," ") = " {{You are signed out}} "]';

    public $configurableProductLabelXpath = '//div[@id="product-options-wrapper"]/descendant::*[contains(concat(" ",normalize-space(@class)," ")," swatch-attribute-label ") or self::label]';

    public $configurableSwatchOptionLabelAttributeName = 'option-label';

    public $configurableSwatchSelectorXpath = '((%s)[%d]/../div[contains(concat(" ",normalize-space(@class)," ")," swatch-attribute-options ")]/descendant::div[contains(concat(" ",normalize-space(@class)," ")," swatch-option ")])[%d]';

    public $registrationNavigationInstructions = [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK,  '//div[contains(concat(" ",normalize-space(@class)," ")," panel ")]/descendant::li/a[concat(" ",normalize-space(.)," ") = " {{Create an Account}} "]']
    ];

    public $registerFirstNameXpath           = '//input[@id="firstname"]';
    public $registerLastNameXpath            = '//input[@id="lastname"]';
    public $registerEmailXpath               = '//input[@id="email_address"]';
    public $registerPasswordXpath            = '//input[@id="password"]';
    public $registerConfirmPasswordXpath     = '//input[@id="password-confirmation"]';
    public $registerNewsletterXpath          = '//input[@id="is_subscribed"]';
    public $registerSubmitXpath              = '//button[@type="submit" and contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," submit ")]';
    public $myAccountTitle                  = 'My Account';

    public function configure(AbstractTestCase $testCase)
    {
        parent::configure($testCase);
        $testCase->setTypePreference(
            'Magium\Magento\Themes\Admin\ThemeConfiguration',
            'Magium\Magento2\Themes\Admin\ThemeConfiguration'
        );
        $testCase->setTypePreference(
            'Magium\Magento\Navigators\Admin\AdminMenu',
            'Magium\Magento2\Navigators\Admin\AdminMenu'
        );
        $testCase->setTypePreference(
            'Magium\Magento\Navigators\Customer\AccountHome',
            'Magium\Magento2\Navigators\Customer\AccountHome'
        );
    }

    /**
     * @return array
     */
    public function getNavigateToLoggedInCustomerPageInstructions()
    {
        return $this->translatePlaceholders($this->navigateToLoggedInCustomerPageInstructions);
    }



    public function getCustomerThemeClass()
    {
        return 'Magium\Magento2\Themes\Magento2\Customer\ThemeConfiguration';
    }

    public function getCheckoutThemeClass()
    {
        return 'Magium\Magento2\Themes\Magento2\Checkout\ThemeConfiguration';
    }

}