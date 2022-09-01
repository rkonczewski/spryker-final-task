<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqVoteTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqZedStub implements FaqZedStubInterface
{
    /**
     * @var ZedRequestClientInterface
     */
    private ZedRequestClientInterface $zedRequestClient;

    /**
     * @param ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActive(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->zedRequestClient->call(
            '/faq/gateway/get-faq-collection-active',
            $faqCollectionTransfer
        );
    }

    /**
     * @param FaqVoteTransfer $faqVoteTransfer
     * @return FaqVoteTransfer
     */
    public function faqVote(FaqVoteTransfer $faqVoteTransfer): FaqVoteTransfer
    {
        return $this->zedRequestClient->call(
            '/faq/gateway/faq-vote',
            $faqVoteTransfer
        );
    }
}
