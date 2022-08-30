<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface FaqsReaderInterface
{
    /**
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function getFaqs(RestRequestInterface $restRequest): RestResponseInterface;

    /**
     * @param RestRequestInterface $restRequest
     * @param $idQuestion
     * @return RestResponseInterface
     */
    public function getFaqItem(RestRequestInterface $restRequest, $idQuestion): RestResponseInterface;
}
