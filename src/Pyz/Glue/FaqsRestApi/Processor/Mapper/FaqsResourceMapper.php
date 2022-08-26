<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestFaqsResponseAttributeTransfer;

class FaqsResourceMapper implements FaqsResourceMapperInterface
{
    /**
     * @param array $faqData
     * @return RestFaqsResponseAttributeTransfer
     */
    public function mapFaqDataToPlanetRestAttributes(array $faqData): RestFaqsResponseAttributeTransfer
    {
        $restFaqAttributesTransfer = (new RestFaqsResponseAttributeTransfer())
            ->fromArray($faqData, true);

        return $restFaqAttributesTransfer;
    }
}
