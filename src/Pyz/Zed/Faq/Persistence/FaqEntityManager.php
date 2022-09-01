<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\PyzFaqVoteQuery;
use Orm\Zed\FaqVote\Persistence\PyzFaqVote;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * @method FaqPersistenceFactory getFactory()
 */
class FaqEntityManager extends AbstractEntityManager implements FaqEntityManagerInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function saveFaqEntity(FaqTransfer $faqTransfer): FaqTransfer
    {
        $faqEntity = $this->CreatePyzFaqQuery()
            ->filterByIdQuestion($faqTransfer->getIdQuestion())
            ->findOneOrCreate();
        $faqEntity->fromArray($faqTransfer->toArray());
        $faqEntity->save();
        $faqTransfer->fromArray($faqEntity->toArray());

        return $faqTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return void
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function deleteFaqEntity(FaqTransfer $faqTransfer): void
    {
        $faqEntity = $this
            ->createPyzFaqQuery()
            ->filterByIdQuestion($faqTransfer->getIdQuestion());
        $faqEntity->delete();
    }

    /**
     * @return PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    public function createVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        $faqVote = new PyzFaqVote();
        $faqVote->setFaqId($faqVoteTransfer->getIdQuestion());
        $faqVote->save();

        return $faqVoteTransfer;
    }
}
