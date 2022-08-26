<?php

namespace Pyz\Glue\FaqsRestApi;

use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsReader;
use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsReaderInterface;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\FaqsRestApi\faqsRestApiClientInterface getClient()
 */

class FaqsRestApiFactory extends AbstractFactory
{
    /**
     * @return FaqsResourceMapper
     */
    public function createFaqsResourceMapper(): FaqsResourceMapper
    {
        return new FaqsResourceMapper();
    }

    /**
     * @return FaqsReaderInterface
     */
    public function createFaqsReader(): FaqsReaderInterface
    {
        return new FaqsReader(
            $this->getClient(),
            $this->getResourceBuilder(),
            $this->createFaqsResourceMapper(),
        );

    }
}
