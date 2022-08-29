<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqsDeleter implements FaqsDeleterInterface
{
    private FaqsRestApiClientInterface $faqsRestApiClient;
    /**
     * @var RestResourceBuilderInterface
     */
    private RestResourceBuilderInterface $restResourceBuilder;
    /**
     * @var FaqsResourceMapper
     */
    private FaqsResourceMapper $faqsResourceMapper;

    /**
     * @param FaqsRestApiClientInterface $faqsRestApiClient
     * @param RestResourceBuilderInterface $restResourceBuilder
     */
    public function __construct(
        FaqsRestApiClientInterface $faqsRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder
    ) {
        $this->faqsRestApiClient = $faqsRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @param FaqTransfer $faqTransfer
     * @return RestResponseInterface
     */
    public function delete(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $faqDelete = $this->faqsRestApiClient->deleteFaqItem($faqTransfer);

        if (!$faqDelete) {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())->setCode('Error occurs.')
                    ->setStatus(500)
            );
        }
        return $restResponse->addError(
            (new RestErrorMessageTransfer())->setCode('Faq deleted.')
                ->setStatus('200')
        );
    }
}
