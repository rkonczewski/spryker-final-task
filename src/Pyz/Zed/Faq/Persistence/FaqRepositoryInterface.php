<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqRepositoryInterface
{
    /**
     * @param $idFaq
     * @return FaqTransfer|null
     */
    public function findFaqById($idFaq): ?FaqTransfer;

    /**
     * @param FaqCollectionTransfer $faqsRestApiTransfer
     * @return mixed
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer;

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
