<?php

namespace Pyz\Zed\Faq;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Service\Container\Exception\ContainerException;
use Spryker\Service\Container\Exception\FrozenServiceException;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class FaqDependencyProvider extends AbstractBundleDependencyProvider
{
    public const QUERY_FAQ = 'QUERY_FAQ';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws ContainerException
     * @throws
    \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideCommunicationLayerDependencies(Container
    $container): Container
    {
        $container = $this->addPyzFaqPropelQuery($container);
        return $container;
    }

    /**
     * @param Container $container
     * @return Container
     * @throws ContainerException
     * @throws FrozenServiceException
     */
    private function addPyzFaqPropelQuery(Container $container): Container
    {
        $container->set(
            static::QUERY_FAQ,
            $container->factory(fn() => PyzFaqQuery::create())
        );
        return $container;
    }
}
