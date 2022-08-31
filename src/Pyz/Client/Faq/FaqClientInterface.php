<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqClientInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
