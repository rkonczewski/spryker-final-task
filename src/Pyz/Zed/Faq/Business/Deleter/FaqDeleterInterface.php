<?php

namespace Pyz\Zed\Faq\Business\Deleter;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqDeleterInterface
{
    /**
     * @param FaqTransfer $faqTransfer
     * @return mixed
     */
    public function deleteFaqEntity(FaqTransfer $faqTransfer);
}
