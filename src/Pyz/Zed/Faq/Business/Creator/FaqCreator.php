<?php

namespace Pyz\Zed\Faq\Business\Creator;

use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class FaqCreator implements FaqCreatorInterface
{
    /**
     * @var FaqEntityManagerInterface
     */
    protected FaqEntityManagerInterface $faqEntityManager;

    /**
     * @param FaqEntityManagerInterface $faqEntityManager
     */
    public function __construct(FaqEntityManagerInterface $faqEntityManager)
    {
        $this->faqEntityManager = $faqEntityManager;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->faqEntityManager->saveFaqEntity($faqTransfer);
    }
}
