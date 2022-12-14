<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface;
use Pyz\Glue\FaqsRestApi\FaqsRestApiConfig;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqsReader implements FaqsReaderInterface
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
     * @return RestResponseInterface
     */
    public function getFaqs(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();
        $faqCollectionTransfer = $this->faqsRestApiClient->getFaqCollection(new FaqCollectionTransfer());

        foreach ($faqCollectionTransfer->getFaqs() as $faqTransfer) {
            $restResource = $this->restResourceBuilder->createRestResource(
                FaqsRestApiConfig::RESOURCE_FAQS,
                $faqTransfer->getIdQuestion(),
                $this->faqsResourceMapper->mapFaqDataToPlanetRestAttributes($faqTransfer->toArray())
            );
            $restResponse->addResource($restResource);
        }
        return $restResponse;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @param $idQuestion
     * @return RestResponseInterface
     */
    public function getFaqItem(RestRequestInterface $restRequest, $idQuestion): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $faqTransfer = new FaqTransfer();
        $faqTransfer->setIdQuestion($idQuestion);
        $faqTransfer = $this->faqsRestApiClient->getFaqItem($faqTransfer);

        if (!$faqTransfer) {
            $restResponse->addError(
                (new RestErrorMessageTransfer())
                    ->setDetail('Faq not found')
                    ->setStatus(404)
            );
            return $restResponse;
        }
        $restResource = $this->restResourceBuilder->createRestResource(
            FaqsRestApiConfig::RESOURCE_FAQS,
            $faqTransfer->getIdQuestion(),
            $this->faqsResourceMapper->mapFaqDataToPlanetRestAttributes($faqTransfer->toArray())
        );
        $restResponse->addResource($restResource);

        return $restResponse;
    }
}
