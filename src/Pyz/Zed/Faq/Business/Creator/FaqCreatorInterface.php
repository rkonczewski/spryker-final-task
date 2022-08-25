<?php

namespace Pyz\Zed\Faq\Business\Creator;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqCreatorInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer;
}
