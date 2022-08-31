<?php

namespace Pyz\Client\Faq;

use Pyz\Client\Faq\Zed\FaqZedStub;
use Pyz\Client\Faq\Zed\FaqZedStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqFactory extends AbstractFactory
{
    /**
     * @return FaqZedStubInterface
     * @throws ContainerKeyNotFoundException
     */
    public function createFaqZedStub(): FaqZedStubInterface
    {
        return new FaqZedStub($this->getZedRequestClient());
    }

    /**
     * @return ZedRequestClientInterface
     * @throws ContainerKeyNotFoundException
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(FaqDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
