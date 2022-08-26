<?php

namespace Pyz\Client\FaqsRestApi;

use Pyz\Client\FaqsRestApi\Zed\FaqsRestApiZedStub;
use Pyz\Client\FaqsRestApi\Zed\FaqsRestApiZedStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqsRestApiFactory extends AbstractFactory
{
    /**
     * @return FaqsRestApiZedStubInterface
     * @throws ContainerKeyNotFoundException
     */
    public function createFaqZedStub(): FaqsRestApiZedStubInterface
    {
        return new FaqsRestApiZedStub($this->getZedRequestClient());
    }

    /**
     * @return ZedRequestClientInterface
     * @throws ContainerKeyNotFoundException
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(FaqsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
