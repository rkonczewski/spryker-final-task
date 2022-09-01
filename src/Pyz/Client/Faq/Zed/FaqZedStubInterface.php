<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;

interface FaqZedStubInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function faqVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
