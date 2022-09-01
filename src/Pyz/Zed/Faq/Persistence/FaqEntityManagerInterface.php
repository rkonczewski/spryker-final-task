<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;

interface FaqEntityManagerInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function saveFaqEntity(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function createVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
