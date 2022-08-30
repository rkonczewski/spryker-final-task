<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqsCreator implements FaqsCreatorInterface
{
    /**
     * @var FaqsRestApiClientInterface
     */
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
     * @param FaqsResourceMapperInterface $faqsResourceMapper
     */
    public function __construct(
        FaqsRestApiClientInterface $faqsRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder,
        FaqsResourceMapperInterface $faqsResourceMapper

    ) {
        $this->faqsRestApiClient = $faqsRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->faqsResourceMapper = $faqsResourceMapper;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @param FaqTransfer $faqTransfer
     * @return RestResponseInterface
     */
    public function create(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $faqCreate = $this->faqsRestApiClient->createFaqItem($faqTransfer);

        if (!$faqCreate) {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())->setDetail('Error occurs.')
                    ->setStatus(500)
            );
        }
        return $restResponse->addError(
            (new RestErrorMessageTransfer())->setDetail('Faq was created.')
                ->setStatus('200')
        );
    }
}
