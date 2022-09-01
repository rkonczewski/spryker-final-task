<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Spryker\Client\Kernel\AbstractClient;

class FaqClient extends AbstractClient implements FaqClientInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqCollectionActive($faqCollectionTransfer);
    }

    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function faqVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->faqVote($faqVoteTransfer);
    }
}
