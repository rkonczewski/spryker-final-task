<?php

namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqFacadeInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return FaqTransfer
     */
    public function createFaqEntity(FaqTransfer $faqTransfer): FaqTransfer;

    /**
     *
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function deleteFaqEntity(FaqTransfer $faqTransfer);
}
