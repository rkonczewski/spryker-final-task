<?php

namespace Pyz\Client\FaqsRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqsRestApiClientInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function deleteFaqItem(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     *
     */
    public function createFaqItem(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function getFaqItem(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function updateFaqItem(FaqTransfer $faqTransfer): FaqTransfer;
}
