<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class EditController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idFaq = $this->castId($request->query->get('id-faq'));
        $faq = $this->getFaq($idFaq);

        if ($faq === null) {
            $this->addErrorMessage('Error occurs. Please, try again.');
            return $this->redirectResponse('/faq/list');
        }

        $faqTransfer = (new FaqTransfer())
            ->setIdQuestion($idFaq)
            ->setQuestion($faq->getQuestion())
            ->setAnswer($faq->getAnswer());
        $faqForm = $this->getFactory()
            ->createFaqForm($faqTransfer)
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()->createFaqEntity($faqForm->getData());
            $this->addSuccessMessage('FAQ was updated.');
            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
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
