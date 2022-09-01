<?php

namespace Pyz\Zed\Faq\Business\VoteCreator;

use Generated\Shared\Transfer\FaqVoteTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class FaqVoteCreator implements FaqVoteCreatorInterface
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
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function createVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        return $this->faqEntityManager->createVote();
    }
}
