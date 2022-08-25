<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqRepositoryInterface
{
    /**
     * @param $idFaq
     * @return FaqTransfer|null
     */
    public function findFaqById($idFaq): ?FaqTransfer;

}
