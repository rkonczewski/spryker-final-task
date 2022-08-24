<?php

namespace Pyz\Zed\Faq\Communication;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Pyz\Zed\Faq\Communication\Table\FaqTable;
use Pyz\Zed\Faq\FaqDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;

class FaqCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return FaqTable
     * @throws ContainerKeyNotFoundException
     */
    public function createFaqTable(): FaqTable
    {
        return new FaqTable($this->getFaqPropelQuery());
    }

    /**
     * @return PyzFaqQuery
     * @throws ContainerKeyNotFoundException
     */
    private function getFaqPropelQuery(): PyzFaqQuery
    {
        return $this->getProvidedDependency(FaqDependencyProvider::QUERY_FAQ);
    }
}
