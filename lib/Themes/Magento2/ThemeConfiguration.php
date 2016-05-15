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

    public $checkoutNavigationInstructions  = [
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK, '//a[contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," showcart ")]'],
        [InstructionNavigator::INSTRUCTION_MOUSE_CLICK, '//button[@id="top-cart-btn-checkout"]']
    ];

    public $registerFirstNameXpath           = '//input[@id="firstname"]';
    public $registerLastNameXpath            = '//input[@id="lastname"]';
    public $registerEmailXpath               = '//input[@id="email_address"]';
    public $registerPasswordXpath            = '//input[@id="password"]';
    public $registerConfirmPasswordXpath     = '//input[@id="password-confirmation"]';
    public $registerNewsletterXpath          = '//input[@id="is_subscribed"]';
    public $registerSubmitXpath              = '//button[@type="submit" and contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," submit ")]';
    public $myAccountTitle                  = 'My Account';

    public $searchInputXpath                = '//input[@id="search"]';

    public $searchSubmitXpath               = '//button[@type="submit" and contains(concat(" ",normalize-space(@class)," ")," search ")]';
    public $searchSuggestionTextXpath        = '//div[@id="search_autocomplete"]/descendant::li[@role="option"][%d]/descendant::span[@class="qs-option-name"]';
    public $searchSuggestionCountXpath       = '//div[@id="search_autocomplete"]/descendant::li[@role="option"][%d]/descendant::span[@class="amount"]';

    public $viewModeAttributeName           = 'title';
    public $productCollectionViewModeXpath   = '//div[contains(concat(" ",normalize-space(@class)," ")," modes ")]/descendant::*[contains(concat(" ",normalize-space(@class)," ")," active ") and contains(concat(" ",normalize-space(@class)," ")," modes-mode ")]';
    public $productCollectionSortByXpath     = '//select[@id="sorter"]/descendant::option[@selected]';
    public $productCollectionShowCountXpath  = '//select[@id="limiter"]/descendant::option[@selected]'; // dittos
    public $productCollectionShowCountOptionsXpath  = '//select[@id="limiter"]/descendant::option';
    public $productCollectionProductCountXpath = '//p[@id="toolbar-amount"]';

    public $productGridBaseXpath             = '//div[contains(concat(" ",normalize-space(@class)," ")," products-grid ")]/descendant::li[%d]';
    public $productGridDescriptionXpath      = '/*[.="no description in the grid view"]';
    public $productGridTitleXpath            = '/descendant::a[contains(concat(" ",normalize-space(@class)," ")," product-item-link ")]';
    public $productGridCompareLinkXpath      = '/descendant::div[@data-role="add-to-links"]/descendant::a[contains(concat(" ",normalize-space(@class)," ")," tocompare ")]';
    public $productGridImageXpath            = '/descendant::img[@class="product-image-photo"]';
    public $productGridLinkXpath             = '/descendant::a[contains(concat(" ",normalize-space(@class)," ")," product-item-link ")]';
    public $productGridOriginalPriceXpath    = '/descendant::div[@class="price-box"]/descendant::p[@class="old-price"]/descendant::*[@class="price"]';
    public $productGridPriceXpath            = '/descendant::div[contains(concat(" ",normalize-space(@class)," ")," price-final_price ")]/descendant::span[@class="price"]';
    public $productGridWishlistLinkXpath     = '/descendant::div[@data-role="add-to-links"]/descendant::a[contains(concat(" ",normalize-space(@class)," ")," towishlist ")]';
    public $productGridAddToCartLinkXpath    = '/descendant::button[contains(concat(" ",normalize-space(@class)," ")," tocart ")]';

    public $productListBaseXpath             = '//div[contains(concat(" ",normalize-space(@class)," ")," products-list ")]/descendant::li[%d]';
    public $productListDescriptionXpath      = '/unknown';
    public $productListTitleXpath            = '/descendant::a[contains(concat(" ",normalize-space(@class)," ")," product-item-link ")]';
    public $productListCompareLinkXpath      = '/descendant::div[@data-role="add-to-links"]/descendant::a[contains(concat(" ",normalize-space(@class)," ")," tocompare ")]';
    public $productListImageXpath            = '/descendant::img[@class="product-image-photo"]';
    public $productListLinkXpath             = '/descendant::a[contains(concat(" ",normalize-space(@class)," ")," product-item-link ")]';
    public $productListOriginalPriceXpath    = '/descendant::div[@class="price-box"]/descendant::p[@class="old-price"]/descendant::*[@class="price"]';
    public $productListPriceXpath            = '/descendant::div[contains(concat(" ",normalize-space(@class)," ")," price-final_price ")]/descendant::span[@class="price"]';
    public $productListWishlistLinkXpath     = '/descendant::div[@data-role="add-to-links"]/descendant::a[contains(concat(" ",normalize-space(@class)," ")," towishlist ")]';
    public $productListAddToCartLinkXpath    = '/descendant::button[contains(concat(" ",normalize-space(@class)," ")," tocart ")]';

    public $layeredNavigationTestXpath       =  '//div[@id="narrow-by-list"]';

    public $contactUsNameXpath = '//form[@id="contact-form"]/descendant::input[@id="name"]';
    public $contactUsEmailXpath = '//form[@id="contact-form"]/descendant::input[@id="email"]';
    public $contactUsTelephoneXpath = '//form[@id="contact-form"]/descendant::input[@id="telephone"]';
    public $contactUsCommentXpath = '//form[@id="contact-form"]/descendant::textarea[@id="comment"]';
    public $contactUsSubmitXpath = '//form[@id="contact-form"]/descendant::button';


    public $breadCrumbXpath                  = '//div[@class="breadcrumbs"]';
    public $breadCrumbMemberXpath = '/descendant::a[concat(" ",normalize-space(.)," ")=" {{%s}} "]';
    public $breadCrumbSelectorXpath = '/descendant::a[%d]';

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
        $testCase->setTypePreference(
            'Magium\Magento\Actions\Checkout\GuestCheckout',
            'Magium\Magento2\Actions\Checkout\GuestCheckout'
        );
        $testCase->setTypePreference(
            'Magium\Magento\Actions\Checkout\CustomerCheckout',
            'Magium\Magento2\Actions\Checkout\CustomerCheckout'
        );
        $testCase->setTypePreference(
            'Magium\Magento\Actions\Checkout\PaymentMethods\CashOnDelivery',
            'Magium\Magento2\Actions\Checkout\PaymentMethods\CashOnDelivery'
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