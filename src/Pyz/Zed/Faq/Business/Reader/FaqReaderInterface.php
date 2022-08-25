<?php

namespace Pyz\Zed\Faq\Business\Reader;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqReaderInterface
{
    /**
     * @param $idFaq
     * @return FaqTransfer|null
     */
    public function findFaqById($idFaq): ?FaqTransfer;

}
