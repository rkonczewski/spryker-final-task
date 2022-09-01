<?php

namespace PyzTest\Zed\Faq\Communication\Controller;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\FaqBuilder;

class StatusControllerTest extends Unit
{
    public function testIsFaqActive()
    {
        $faqTransfer = (new FaqBuilder([
            'isActive' => true,
        ]))->build();

        return $this->assertTrue($faqTransfer->getIsActive());
    }

    public function testIsFaqNotActive()
    {
        $faqTransfer = (new FaqBuilder([
            'isActive' => false,
        ]))->build();

        return $this->assertFalse($faqTransfer->getIsActive());
    }
}
