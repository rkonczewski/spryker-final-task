<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param FaqCollectionTransfer $faqsRestApiTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionAction(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->getFacade()->getFaqCollection($faqsRestApiTransfer);
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function deleteFaqItemAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        $this->getFacade()->deleteFaqEntity($faqTransfer);

        return $faqTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function createFaqItemAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        $this->getFacade()->createFaqEntity($faqTransfer);

        return $faqTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function getFaqItemAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        $this->getFacade()->getFaqItem($faqTransfer);

        return $faqTransfer;
    }

    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function updateFaqItemAction(FaqTransfer $faqTransfer): FaqTransfer
    {
        $this->getFacade()->createFaqEntity($faqTransfer);

        return $faqTransfer;
    }

    /**
     * @param FaqCollectionTransfer $faqCollectionTransfer
     * @return FaqCollectionTransfer
     */
    public function getFaqCollectionActiveAction(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        $this->getFacade()->getFaqCollectionActive($faqCollectionTransfer);

        return $faqCollectionTransfer;
    }
}
