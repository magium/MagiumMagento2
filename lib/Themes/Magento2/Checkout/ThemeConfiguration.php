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

    public $defaultShippingXpath        = '//div[@id="checkout-shipping-method-load"]/descendant::input';

    public $opcContinueButtonXpath      = '//button[@data-role="opc-continue"]';

    public $placeOrderButtonXpath       = '//button[@type="submit" and contains(concat(" ",normalize-space(@class)," ")," action ") and contains(concat(" ",normalize-space(@class)," ")," checkout ") and not(@disabled)]';

    public $billingFirstNameXpath      = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="firstname"]';
    public $billingLastNameXpath       = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="lastname"]';
    public $billingCompanyXpath        = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="company"]';
    public $billingEmailAddressXpath   = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="email"]';
    public $billingAddressXpath        = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="street[0]"]';
    public $billingAddress2Xpath       = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="street[1]"]';
    public $billingCityXpath           = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="city"]';
    public $billingRegionIdXpath       = '//fieldset[@id="billing-new-address-form"]/descendant::select[@name="region_id"]/descendant::option[.="%s"]';
    public $billingPostCodeXpath       = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="postcode"]';
    public $billingCountryIdXpath      = '//fieldset[@id="billing-new-address-form"]/descendant::select[@name="country_id"]/descendant::option[@value="%s"]';
    public $billingTelephoneXpath      = '//fieldset[@id="billing-new-address-form"]/descendant::input[@name="telephone"]';

    // Note, for the next two Xpaths, there are two elements that match this xpath.  They are both exactly the same.  I'm not sure why the second is there.
    public $billingUpdateButtonXpath      = '//button[contains(concat(" ",normalize-space(@class)," "), " action-update ")]';
    public $billingSaveAddressXpath       = '//input[@id="billing-save-in-address-book"]';

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

    public $doNotUseBillingAddressForShipping = '//input[@id="billing-address-same-as-shipping-%s"]';

    public $billingNewAddressXpath = '//select[@name="billing_address_id"]/descendant::option[.="{{New Address}}"]';

    public $saveShippingAddressButtonXpath = '//div[@id="opc-new-shipping-address"]/../../descendant::button[contains(concat(" ",normalize-space(@class)," ")," action-save-address ")]';

    public $saveInAddressBookToggleXpath = '//input[@id="shipping-save-in-address-book"]';

    public $shippingMethodContinueButtonXpath = '//div[@id="shipping-method-buttons-container"]/descendant::button';
    /**
     * @return string
     */
    public function getSaveInAddressBookToggleXpath()
    {
        return $this->saveInAddressBookToggleXpath;
    }

    /**
     * @return string
     */
    public function getSaveShippingAddressButtonXpath()
    {
        return $this->saveShippingAddressButtonXpath;
    }
    
    /**
     * @return string
     */
    public function getBillingSaveAddressXpath()
    {
        return $this->translatePlaceholders($this->billingSaveAddressXpath);
    }

    /**
     * @return string
     */
    public function getBillingUpdateButtonXpath()
    {
        return $this->translatePlaceholders($this->billingUpdateButtonXpath);
    }



    public function getUseDifferentBillingAddressXpath($id)
    {
        $xpath = sprintf($this->doNotUseBillingAddressForShipping, $id);
        return $this->translatePlaceholders($xpath);
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
