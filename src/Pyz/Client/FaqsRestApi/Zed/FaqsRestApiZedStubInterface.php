<?php

namespace Pyz\Client\FaqsRestApi\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqsRestApiZedStubInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function deleteFaqItem(FaqTransfer $faqTransfer);

    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function createFaqItem(FaqTransfer $faqTransfer);

    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function getFaqItem(FaqTransfer $faqTransfer);

    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function updateFaqItem(FaqTransfer $faqTransfer);
}
