<?php

namespace Pyz\Zed\Faq\Business;

use Pyz\Zed\Faq\Business\Creator\FaqCreator;
use Pyz\Zed\Faq\Business\Creator\FaqCreatorInterface;
use Pyz\Zed\Faq\Business\Deleter\FaqDeleter;
use Pyz\Zed\Faq\Business\Deleter\FaqDeleterInterface;
use Pyz\Zed\Faq\Business\Reader\FaqReader;
use Pyz\Zed\Faq\Business\Reader\FaqReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface getRepository()
 */
class FaqBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return FaqCreatorInterface
     */
    public function createFaq(): FaqCreatorInterface
    {
        return new FaqCreator($this->getEntityManager());
    }

    /**
     * @return FaqReaderInterface
     */
    public function createFaqReader(): FaqReaderInterface
    {
        return new FaqReader($this->getRepository());
    }

    /**
     * @return FaqDeleterInterface
     */
    public function createFaqDeleter(): FaqDeleterInterface
    {
        return new FaqDeleter($this->getEntityManager());
    }
}
