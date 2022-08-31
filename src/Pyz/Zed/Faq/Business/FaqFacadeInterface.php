<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqFacadeInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     *
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function deleteFaqEntity(FaqTransfer $faqTransfer);

    /**
     * @param FaqCollectionTransfer $faqsRestApiTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer;

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer|null
     */
    public function getFaqItem(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    ;
}
