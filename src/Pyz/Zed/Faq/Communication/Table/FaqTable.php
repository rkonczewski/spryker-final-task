<?php

namespace Pyz\Zed\Faq\Communication\Table;

use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class FaqTable extends AbstractTable
{
    /**
     * @var string
     */
    public const ACTION = 'Actions';
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
            PyzFaqTableMap::COL_ID_VOTE => 'Rating',
            PyzFaqTableMap::COL_IS_ACTIVE => 'Active',
            static::ACTION => 'Actions',
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_QUESTION,
            PyzFaqTableMap::COL_ID_VOTE,
            PyzFaqTableMap::COL_IS_ACTIVE,
        ]);

        $config->setSearchable([
            PyzFaqTableMap::COL_QUESTION,
        ]);

        $config->setRawColumns([static::ACTION]);

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
                PyzFaqTableMap::COL_ID_VOTE => $faqDataItem[PyzFaqTableMap::COL_ID_VOTE],
                PyzFaqTableMap::COL_IS_ACTIVE => $faqDataItem[PyzFaqTableMap::COL_IS_ACTIVE],
                static::ACTION => $this->generateEditButton(
                        Url::generate('/faq/edit/', [
                            'id-faq' => $faqDataItem[PyzFaqTableMap::COL_ID_QUESTION],
                        ]),
                        'Edit'
                    ) . $this->generateRemoveButton(
                        Url::generate(
                            '/faq/delete',
                            [
                                'id-faq' => $faqDataItem[PyzFaqTableMap::COL_ID_QUESTION],
                            ]
                        ),
                        'Delete'
                    ) . $this->generateViewButton(
                        Url::generate(
                            '/faq/status',
                            [
                                'id-faq' => $faqDataItem[PyzFaqTableMap::COL_ID_QUESTION],
                            ]
                        ),
                        'Change Status'
                    )
            ];
        }
        return $faqTableRows;
    }
}
