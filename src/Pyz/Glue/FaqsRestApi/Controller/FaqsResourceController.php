<?php

namespace Pyz\Glue\FaqsRestApi\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Glue\FaqsRestApi\FaqsRestApiFactory getFactory()
 */
class FaqsResourceController extends AbstractController
{
    /**
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()
            ->createFaqsReader()
            ->getFaqs($restRequest);
    }

    public function deleteAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        $faqId = (new FaqTransfer())->setIdQuestion($restRequest->getResource()->getId());

        return $this->getFactory()
            ->createFaqsDeleter()
            ->delete($restRequest, $faqId);
    }

    /**
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function createAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        $faqTransfer = (new FaqTransfer())->fromArray($restRequest->getResource()->toArray());

        return $this->getFactory()
            ->createFaqsCreator()
            ->create($restRequest, $faqTransfer);
    }
}
