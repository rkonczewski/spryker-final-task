<?php

namespace Pyz\Glue\FaqsRestApi\Plugin;

use Generated\Shared\Transfer\RestFaqsResponseAttributeTransfer;
use org\bovigo\vfs\content\StringBasedFileContent;
use Pyz\Glue\FaqsRestApi\FaqsRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Glue\faqsRestApi\FaqsRestApiFactory getFactory()
 */
class FaqsResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * @param ResourceRouteCollectionInterface $resourceRouteCollection
     * @return ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection
    ): ResourceRouteCollectionInterface {
        $resourceRouteCollection->addGet('get', false)
            ->addDelete('delete', false)
            ->addPost('post', true)
            ->addPatch('path', false);

        return $resourceRouteCollection;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return FaqsRestApiConfig::RESOURCE_FAQS;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return 'faqs-resource';
    }

    /**
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestFaqsResponseAttributeTransfer::class;
    }
}
