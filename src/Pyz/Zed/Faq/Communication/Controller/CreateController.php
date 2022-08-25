<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class CreateController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $faqForm = $this->getFactory()
            ->createFaqForm()
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()->createFaqEntity($faqForm->getData());
            $this->addSuccessMessage('New FAQ was created.');

            return $this->redirectResponse('/faq/list');
        }
        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
    }
}
