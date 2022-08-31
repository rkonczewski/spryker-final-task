<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqZedStubInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
