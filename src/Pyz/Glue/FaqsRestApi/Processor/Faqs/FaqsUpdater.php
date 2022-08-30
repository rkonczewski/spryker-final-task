<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqsRestApi\FaqRestApiClientInterface;
use Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqsUpdater implements FaqsUpdaterInterface
{
    /**
     * @var FaqsRestApiClientInterface
     */
    private FaqsRestApiClientInterface $faqsRestApiClient;
    /**
     * @var RestResourceBuilderInterface
     */
    private RestResourceBuilderInterface $restResourceBuilder;

    public function __construct(
        FaqsRestApiClientInterface $faqRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder
    ) {
        $this->faqRestApiClient = $faqRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @param FaqTransfer $faqTransfer
     * @return RestResponseInterface
     */
    public function update(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $faqUpdate = $this->faqRestApiClient->updateFaqItem($faqTransfer);
        if ($faqUpdate) {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())
                    ->setDetail('Faq updated')
                    ->setStatus(201)
            );
        }
        return $restResponse->addError(
            (new RestErrorMessageTransfer())
                ->setDetail('Error occurs.')
                ->setStatus(500)
        );
    }
}
