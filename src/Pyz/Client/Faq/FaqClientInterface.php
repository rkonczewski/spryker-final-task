<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;

interface FaqClientInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;

    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function faqVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer;
}
