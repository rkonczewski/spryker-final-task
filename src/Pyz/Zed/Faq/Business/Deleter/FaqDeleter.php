<?php

namespace Pyz\Zed\Faq\Business\Deleter;

use Generated\Shared\Transfer\FaqTransfer;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class FaqDeleter implements FaqDeleterInterface
{
    /**
     * @var FaqEntityManagerInterface
     */
    protected $faqEntityManager;

    /**
     * @param FaqEntityManagerInterface $faqEntityManager
     */
    public function __construct(FaqEntityManagerInterface $faqEntityManager)
    {
        $this->faqEntityManager = $faqEntityManager;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed|null
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function deleteFaqEntity(FaqTransfer $faqTransfer)
    {
        return $this->faqEntityManager->deleteFaqEntity($faqTransfer);
    }
}
