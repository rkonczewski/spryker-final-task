<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface FaqsCreatorInterface
{
    /**
     * @param RestRequestInterface $restRequest
     * @param FaqTransfer $faqTransfer
     * @return RestResponseInterface
     */
    public function create(RestRequestInterface $restRequest, FaqTransfer $faqTransfer): RestResponseInterface;
}
