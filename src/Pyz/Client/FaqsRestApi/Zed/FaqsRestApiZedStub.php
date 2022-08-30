<?php

namespace Pyz\Client\FaqsRestApi\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

class FaqsRestApiZedStub implements FaqsRestApiZedStubInterface
{
    /**
     * @var ZedRequestClientInterface
     */
    protected $zedRequestClient;

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
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        /**
         * @var FaqCollectionTransfer $faqCollectionTransfer
         */
        $faqCollectionTransfer = $this->zedRequestClient->call(
            '/faq/gateway/get-faq-collection',
            $faqCollectionTransfer
        );
        return $faqCollectionTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return TransferInterface
     */
    public function deleteFaqItem(FaqTransfer $faqTransfer)
    {
        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/delete-faq-item',
            $faqTransfer
        );

        return $faqTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return TransferInterface
     */
    public function createFaqItem(FaqTransfer $faqTransfer)
    {
        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/create-faq-item',
            $faqTransfer
        );
        return $faqTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return TransferInterface
     */
    public function getFaqItem(FaqTransfer $faqTransfer)
    {
        $faqTransfer = $this->zedRequestClient->call(
            '/faq/gateway/get-faq-item',
            $faqTransfer
        );
        return $faqTransfer;
    }
}
