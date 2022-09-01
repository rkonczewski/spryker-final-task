<?php

namespace Pyz\Yves\Faq\Controller;

use Generated\Shared\Transfer\FaqVoteTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class FaqVoteController extends AbstractController
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idFaqUp = $request->request->get('id-faq-up');
        $idFaqDown = $request->request->get('id-faq-down');

        if ($idFaqUp === null) {
            $this->addErrorMessage('FAQ with provided ID not exists.');

            return $this->redirectResponseInternal('faq-index');
        }
        $faqVoteTransfer = (new FaqVoteTransfer())->setIdQuestion($idFaqUp);
        $this->getClient()->faqVote($faqVoteTransfer);
        $this->addSuccessMessage('Vote with success.');

        if ($idFaqDown === null) {
            $this->addErrorMessage('FAQ with provided ID not exists.');

            return $this->redirectResponseInternal('faq-index');
        }
        $faqVoteTransfer = (new FaqVoteTransfer())->setIdQuestion($idFaqDown);
        $this->getClient()->faqVote($faqVoteTransfer);
        $this->addSuccessMessage('Vote with success.');

        return $this->redirectResponseInternal('faq-index');
    }
}
