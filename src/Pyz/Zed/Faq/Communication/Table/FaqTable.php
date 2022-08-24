<?php

namespace Pyz\Zed\Faq\Communication\Table;

use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class FaqTable extends AbstractTable
{
    /**
     * @var PyzFaqQuery
     */
    private PyzFaqQuery $faqQuery;

    /**
     * @param PyzFaqQuery $faqQuery
     */
    public function __construct(PyzFaqQuery $faqQuery)
    {
        $this->faqQuery = $faqQuery;
    }

    /**
     * @inheritDoc
     *
     * @param TableConfiguration $config
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzFaqTableMap::COL_QUESTION => 'Question',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            PyzFaqTableMap::COL_IS_ACTIVE => 'Active',
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_QUESTION,
            PyzFaqTableMap::COL_IS_ACTIVE,
        ]);

        $config->setSearchable([
            PyzFaqTableMap::COL_QUESTION,
        ]);

        return $config;
    }

    /**
     * @inheritDoc
     *
     * @param TableConfiguration $config
     * @return void|array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $faqDataItems = $this->runQuery($this->faqQuery, $config);
        $faqTableRows = [];

        foreach ($faqDataItems as $faqDataItem) {
            $faqTableRows[] = [
                PyzFaqTableMap::COL_QUESTION => $faqDataItem[PyzFaqTableMap::COL_QUESTION],
                PyzFaqTableMap::COL_ANSWER => $faqDataItem[PyzFaqTableMap::COL_ANSWER],
                PyzFaqTableMap::COL_IS_ACTIVE => $faqDataItem[PyzFaqTableMap::COL_IS_ACTIVE],
            ];
        }
        return $faqTableRows;
    }
}
