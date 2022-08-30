<?php

namespace Pyz\Client\FaqsRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\Kernel\AbstractClient;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;

/**
 * @method \Pyz\Client\FaqsRestApi\FaqsRestApiFactory getFactory()
 */
class FaqsRestApiClient extends AbstractClient implements FaqsRestApiClientInterface
{
    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     * @throws ContainerKeyNotFoundException
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getfaqCollection($faqCollectionTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     * @throws ContainerKeyNotFoundException
     */
    public function deleteFaqItem(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->deleteFaqItem($faqTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     * @throws ContainerKeyNotFoundException
     */
    public function createFaqItem(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->createFaqItem($faqTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     * @throws ContainerKeyNotFoundException
     */
    public function getFaqItem(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqItem($faqTransfer);
    }
}
