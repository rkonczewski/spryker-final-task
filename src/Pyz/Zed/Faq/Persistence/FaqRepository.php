<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaq;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{
    /**
     * @param $idFaq
     * @return FaqTransfer|null
     */
    public function findFaqById($idFaq): ?FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()->findOneByIdQuestion($idFaq);
        if (!$faqEntity) {
            return null;
        }
        return $this->mapEntityToTransfer($faqEntity);
    }

    /**
     * @return PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    /**
     * @param PyzFaq $faqEntity
     * @return FaqTransfer
     */
    private function mapEntityToTransfer(PyzFaq $faqEntity): FaqTransfer
    {
        return (new FaqTransfer())->fromArray($faqEntity->toArray());
    }

    /**
     * @param FaqCollectionTransfer $faqsRestApiTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        $faqCollection = $this->createPyzFaqQuery()
            ->find();

        foreach ($faqCollection as $faqEntity) {
            $faqTransfer = (new FaqTransfer())->fromArray($faqEntity->toArray());
            $faqsRestApiTransfer->addFaq($faqTransfer);
        }

        return $faqsRestApiTransfer;
    }

}
