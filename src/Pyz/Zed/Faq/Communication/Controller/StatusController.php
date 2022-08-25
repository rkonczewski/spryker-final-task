<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class StatusController extends AbstractController
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function indexAction(Request $request): RedirectResponse
    {
        $idFaq = $this->castId($request->query->get('id-faq'));
        $faq = $this->getFaq($idFaq);

        if ($faq === null) {
            $this->addErrorMessage('Error occurs. Id not found.');

            return $this->redirectResponse('/faq/list');
        }

        if ($faq->getIsActive() === true) {
            $faq->setIsActive(false);
        } else {
            $faq->setIsActive(true);
        }

        $faqTransfer = (new FaqTransfer())
            ->setIdQuestion($idFaq)
            ->setQuestion($faq->getQuestion())
            ->setAnswer($faq->getAnswer())
            ->setIsActive($faq->getIsActive());

        $this->getFacade()->createFaqEntity($faqTransfer);
        $this->addSuccessMessage('Status was changed successfully');

        return $this->redirectResponse('/faq/list');
    }

    /**
     * @param $faqId
     * @return FaqTransfer|null
     */
    private function getFaq($faqId): ?FaqTransfer
    {
        return $this->getFacade()->findFaqById($faqId);
    }

}
