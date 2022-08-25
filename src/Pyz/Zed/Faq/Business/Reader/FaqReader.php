<?php

namespace Pyz\Zed\Faq\Business\Reader;

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
}
