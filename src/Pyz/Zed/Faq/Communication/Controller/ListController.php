<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class ListController extends AbstractController
{
    /**
     * @return array
     * @throws ContainerKeyNotFoundException
     */
    public function indexAction(): array
    {
        $faqTable = $this->getFactory()->createFaqTable();

        return $this->viewResponse([
            'faqTable' => $faqTable->render()
        ]);
    }

    /**
     * @return JsonResponse
     * @throws ContainerKeyNotFoundException
     */
    public function tableAction(): JsonResponse
    {
        $faqTable = $this->getFactory()->createFaqTable();

        return $this->jsonResponse($faqTable->fetchData());
    }
}
