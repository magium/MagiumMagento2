<?php

namespace Magium\Magento2\Themes\Magento2\Checkout;


use Magium\Magento\Themes\OnePageCheckout\AbstractThemeConfiguration;

class ThemeConfiguration extends AbstractThemeConfiguration
{

    public $customerEmailInputXpath = '//input[@id="customer-email"]';
    public $customerPasswordInputXpath = '//input[@id="customer-password"]';
    public $customerButtonXpath = '//button[@data-action="checkout-method-login"]';

    public $loadingMaskXpath = '//div[@class="loading-mask"]';

    public $shippingFirstNameXpath      = '//input[@name="firstname"]';
    public $shippingLastNameXpath       = '//input[@name="lastname"]';
    public $shippingCompanyXpath        = '//input[@name="company"]';
    public $shippingEmailAddressXpath   = '//input[@name="email"]';
    public $shippingAddressXpath        = '//input[@name="street[0]"]';
    public $shippingAddress2Xpath       = '//input[@name="street[1]"]';
    public $shippingCityXpath           = '//input[@name="city"]';
    /**
     * @var string The Xpath string for the region_id OPTION to click.  Must be sprintf() compatible
     */
    public $shippingRegionIdXpath       = '//select[@name="region_id"]/descendant::option[.="%s"]';
    public $shippingPostCodeXpath       = '//input[@name="postcode"]';
    /**
     * @var string The Xpath string for the country OPTION to click.  Must be sprintf() compatible
     */
    public $shippingCountryIdXpath      = '//select[@name="country_id"]/descendant::option[@value="%s"]';
    public $shippingTelephoneXpath      = '//input[@name="telephone"]';
    public $shippingFaxXpath            = null; // M2 doesn't have a fax field

    public $shippingMethodFormXpath      = '//form[@id="co-shipping-method-form"]';

    public $defaultShippingXpath        = '//input[@name="shipping_method"]';

    public $opcContinueButtonXpath      = '//button[@data-role="opc-continue"]';

    public $placeOrderButtonXpath       = '//button[@type="submit" and contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," checkout ") and not(@disabled)]';

    public $billingFirstNameXpath      = '//input[@name="firstname"]';
    public $billingLastNameXpath       = '//input[@name="lastname"]';
    public $billingCompanyXpath        = '//input[@name="company"]';
    public $billingEmailAddressXpath   = '//input[@name="email"]';
    public $billingAddressXpath        = '//input[@name="street[0]"]';
    public $billingAddress2Xpath       = '//input[@name="street[1]"]';
    public $billingCityXpath           = '//input[@name="city"]';
    public $billingRegionIdXpath       = '//select[@name="region_id"]/descendant::option[.="%s"]';
    public $billingPostCodeXpath       = '//input[@name="postcode"]';
    public $billingCountryIdXpath      = '//select[@name="country_id"]/descendant::option[@value="%s"]';
    public $billingTelephoneXpath      = '//input[@name="telephone"]';

    public $useDifferentBillingAddressXpath = '//input[@id="billing-address-same-as-shipping-%s]';
    
    public $orderReceivedCompleteXpath = '//div[contains(concat(" ",normalize-space(@class)," ")," checkout-success ")]';

    public $cartSummaryCheckoutProductLoopNameXpath = '(//*[contains(concat(" ",normalize-space(@class)," "), " product-item-name ")])[%d]';

    public $cartSummaryCheckoutProductLoopPriceXpath = '(//*[contains(concat(" ",normalize-space(@class)," "), " cart-price ")])[%d]';
    public $cartSummaryCheckoutProductLoopQtyXpath = '(//div[contains(concat(" ",normalize-space(@class)," "), " details-qty ")]/span[contains(concat(" ",normalize-space(@class)," "), " value ")])[%d]';

    public $cartSummaryCheckoutSubTotal = '//tr[contains(concat(" ",normalize-space(@class)," "), " totals ") and contains(concat(" ",normalize-space(@class)," "), " sub ")]/descendant::span[contains(concat(" ",normalize-space(@class)," "), " price ")]';
    public $cartSummaryCheckoutTax = '//tr[contains(concat(" ",normalize-space(@class)," "), " totals ") and contains(concat(" ",normalize-space(@class)," "), " sub ")]/descendant::span[contains(concat(" ",normalize-space(@class)," "), " tax ")]';
    public $cartSummaryCheckoutGrandTotal = '//tr[contains(concat(" ",normalize-space(@class)," "), " totals ") and contains(concat(" ",normalize-space(@class)," "), " grand ")]/descendant::span[contains(concat(" ",normalize-space(@class)," "), " price ")]';

    public $cartSummaryCheckoutShippingTotal = '//tr[contains(concat(" ",normalize-space(@class)," "), " totals ") and contains(concat(" ",normalize-space(@class)," "), " shipping ")]/descendant::span[contains(concat(" ",normalize-space(@class)," "), " price ")]';

    public $shippingNewAddressXpath       = '//button[contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," action-show-popup ")]';

    public function getUseDifferentBillingAddressXpath($id)
    {
        $xpath = sprintf($this->doNotUseBillingAddressForShipping, $id);
        return $xpath;
    }

    /**
     * @return string
     */
    public function getOpcContinueButtonXpath()
    {
        return $this->opcContinueButtonXpath;
    }

    /**
     * @return string
     */
    public function getLoadingMaskXpath()
    {
        return $this->loadingMaskXpath;
    }



}