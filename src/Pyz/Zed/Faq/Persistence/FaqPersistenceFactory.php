<?php

namespace Pyz\Zed\Faq\Persistence;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;

class FaqPersistenceFactory
{
    /**
     * @return PyzFaqQuery
     */
    public function createFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }
}
