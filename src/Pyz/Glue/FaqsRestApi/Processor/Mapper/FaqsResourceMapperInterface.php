<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestFaqsResponseAttributeTransfer;

interface FaqsResourceMapperInterface
{
    /**
     * @param array $faqData
     * @return RestFaqsResponseAttributeTransfer
     */
    public function mapFaqDataToPlanetRestAttributes(array $faqData): RestFaqsResponseAttributeTransfer;
}
