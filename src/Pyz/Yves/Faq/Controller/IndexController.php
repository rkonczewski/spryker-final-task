<?php

namespace Pyz\Yves\Faq\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;

class IndexController extends AbstractController
{
    /**
     * @return View
     */
    public function indexAction(): View
    {
        $faqs = $this->getClient()->getFaqCollection(new FaqCollectionTransfer());

        foreach ($faqs->getFaqs() as $faq) {
            $questions[] = $faq->toArray();
        }

        return $this->view(
            [
                'questions' => $questions,
            ],
            [],
            '@Faq/views/index/index.twig'
        );
    }
}
