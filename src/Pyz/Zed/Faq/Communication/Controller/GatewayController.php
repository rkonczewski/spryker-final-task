<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

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
}
