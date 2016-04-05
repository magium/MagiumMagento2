<?php

namespace Tests\Magium\Magento2\Action;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Misc\SubmitContactForm;
use Magium\Magento2\ConfigurationSwitcher;

class SendContactFormTest extends AbstractMagentoTestCase
{


    protected function setUp()
    {
        parent::setUp();
        (new ConfigurationSwitcher($this))->configure();
    }

    public function testContactFormWorks()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->byText('{{Contact Us}}')->click();
        $contactForm = $this->getAction(SubmitContactForm::ACTION);
        /* @var $contactForm SubmitContactForm */
        $contactForm->setComment('This is a comment');
        $contactForm->execute();
    }

}