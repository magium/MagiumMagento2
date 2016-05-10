<?php

namespace Magium\Magento2\Actions\Checkout\PaymentMethods;

class CashOnDelivery extends \Magium\Magento\Actions\Checkout\PaymentMethods\CashOnDelivery
{

    public function getId()
    {
        return 'cashondelivery';
    }

    public function pay($requirePayment)
    {
        if ($requirePayment) {
            $this->testCase->assertElementExists($this->getId());
        }

        if ($this->webDriver->elementDisplayed($this->getId())) {
            $this->webDriver->byId($this->getId())->click();
        }
    }

}