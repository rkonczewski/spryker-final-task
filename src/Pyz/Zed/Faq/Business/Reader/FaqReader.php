<?php

namespace Pyz\Zed\Faq\Business\Reader;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqRepositoryInterface;

class FaqReader implements FaqReaderInterface
{
    /**
     * @var FaqRepositoryInterface
     */
    private FaqRepositoryInterface $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * @param $idFaq
     * @return FaqTransfer|null
     */
    public function findFaqById($idFaq): ?FaqTransfer
    {
        return $this->faqRepository->findFaqById($idFaq);
    }

    /**
     * @param FaqCollectionTransfer $faqsRestApiTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->faqRepository->getFaqCollection($faqsRestApiTransfer);
    }

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->faqRepository->getFaqCollectionActive($faqCollectionTransfer);
    }

}
