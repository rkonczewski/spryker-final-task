<?php

namespace Pyz\Zed\Faq\Business\VoteCreator;

use Generated\Shared\Transfer\FaqVoteTransfer;

interface FaqVoteCreatorInterface
{
    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function createVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
