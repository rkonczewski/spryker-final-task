<?php

namespace Pyz\Zed\DataImport\Business\Model\Faq;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class FaqWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    public const KEY_QUESTION = 'question';
    public const KEY_ANSWER = 'answer';

    /**
     * @param DataSetInterface $dataSet
     * @return void
     * @throws PropelException
     * @throws AmbiguousComparisonException
     */
    public function execute(DataSetInterface $dataSet)
    {
        $faqEntity = PyzFaqQuery::create()
            ->filterByQuestion($dataSet[static::KEY_QUESTION])
            ->findOneOrCreate();

        $faqEntity->setAnswer(
            $dataSet[static::KEY_ANSWER]
        );
        if ($faqEntity->isNew() || $faqEntity->isModified()) {
            $faqEntity->save();
        }
    }
}
