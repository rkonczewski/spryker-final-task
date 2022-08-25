<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class DeleteController extends AbstractController
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function indexAction(Request $request): RedirectResponse
    {
        $idFaq = $this->castId($request->query->get('id-faq'));

        if ($idFaq === null) {
            $this->addErrorMessage('Error occurs. Id not found.');

            return $this->redirectResponse('/faq/list');
        }

        $faqTransfer = $this->getFacade()->findFaqById($idFaq);
        if ($faqTransfer === null) {
            $this->addErrorMessage('Error occurs. Id not found.');

            return $this->redirectResponse('/faq/list');
        }

        $this->getFacade()->deleteFaqEntity($faqTransfer);
        $this->addSuccessMessage('FAQ deleted successfully.');

        return $this->redirectResponse('/faq/list');
    }
}
