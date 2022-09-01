<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Faq\Business\FaqBusinessFactory getFactory()
 * @method \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface getRepository()
 */
class FaqFacade extends AbstractFacade implements FaqFacadeInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()->createFaq()->createFaqEntity($faqTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return void
     */
    public function deleteFaqEntity(FaqTransfer $faqTransfer)
    {
        $this->getFactory()
            ->createFaqDeleter()
            ->deleteFaqEntity($faqTransfer);
    }

    /**
     * @param $idFaq
     * @return FaqTransfer|null
     */
    public function findFaqById($idFaq): ?FaqTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->findFaqById($idFaq);
    }

    /**
     * @param FaqCollectionTransfer $faqsRestApiTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->getFaqCollection($faqsRestApiTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function getFaqItem(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faq = $this->findFaqById($faqTransfer->getIdQuestion());

        return $faqTransfer->fromArray($faq->toArray());
    }

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->getFaqCollectionActive($faqCollectionTransfer);
    }

    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function createFaqVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        return $this->getFactory()
            ->createFaqVoteCreator()
            ->createVote($faqVoteTransfer);
    }
}
