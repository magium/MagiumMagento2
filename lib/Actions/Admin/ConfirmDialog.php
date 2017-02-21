<?php

namespace Magium\Magento2\Actions\Admin;

use Magium\Actions\OptionallyConfigurableActionInterface;
use Magium\Assertions\Xpath\Displayed;
use Magium\WebDriver\WebDriver;

class ConfirmDialog implements OptionallyConfigurableActionInterface
{

    const ACTION = 'Admin\ConfirmDialog';

    protected $webDriver;
    protected $displayed;

    public function __construct(
        WebDriver $webDriver,
        Displayed $displayed
    )
    {
        $this->webDriver = $webDriver;
        $this->displayed = $displayed;
    }

    public function execute($param = null)
    {
        if ($param === null) {
            $param = true;
        }

        $xpath = '//aside[contains(concat(" ", normalize-space(@class), " "), " confirm ")]/descendant::button';
        if ($param) {
            $xpath .= '[contains(concat(" ", normalize-space(@class), " "), " action-accept ")]';
        } else {
            $xpath .= '[contains(concat(" ", normalize-space(@class), " "), " action-dismiss ")]';
        }
        $this->displayed->assertSelector($xpath);
        $this->webDriver->byXpath($xpath)->click();
    }

    public function confirm()
    {
        $this->execute();
    }

    public function cancel()
    {
        $this->execute(false);
    }

}
