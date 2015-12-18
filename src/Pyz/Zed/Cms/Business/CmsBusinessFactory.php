<?php

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\CmsConfig;
use Spryker\Zed\Cms\Business\Block\BlockManagerInterface;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Block\BlockManager;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use Spryker\Zed\Cms\Business\Page\PageManagerInterface;
use Spryker\Zed\Cms\Business\Template\TemplateManager;
use Spryker\Zed\Cms\Business\Page\PageManager;
use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use Pyz\Zed\Cms\CmsDependencyProvider;
use Pyz\Zed\Glossary\Business\GlossaryFacade;
use Spryker\Shared\Kernel\Messenger\MessengerInterface;
use Spryker\Zed\Cms\Business\CmsBusinessFactory as SprykerCmsBusinessFactory;
use Spryker\Zed\Cms\Business\Template\TemplateManagerInterface;

/**
 * @method CmsConfig getConfig()
 */
class CmsBusinessFactory extends SprykerCmsBusinessFactory
{

    /**
     * @param MessengerInterface $messenger
     *
     * @return CmsInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new CmsInstall(
            $this->createGlossaryFacade(),
            $this->createUrlFacade(),
            $this->createLocaleFacade(),
            $this->getTemplateManager(),
            $this->getPageManager(),
            $this->getGlossaryKeyMappingManager(),
            $this->getBlockManager(),
            $this->getCmsQueryContainer(),
            $this->getConfig()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return GlossaryFacade
     */
    public function createGlossaryFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_GLOSSARY);
    }

    /**
     * @return UrlFacade
     */
    public function createUrlFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_URL);
    }

    /**
     * @return LocaleFacade
     */
    public function createLocaleFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return PageManagerInterface
     */
    public function getPageManager()
    {
        return new PageManager(
            $this->getCmsQueryContainer(),
            $this->getTemplateManager(),
            $this->getBlockManager(),
            $this->getGlossaryFacade(),
            $this->getTouchFacade(),
            $this->getUrlFacade()
        );
    }

    /**
     * @return TemplateManagerInterface
     */
    public function getTemplateManager()
    {
        return new TemplateManager(
            $this->getCmsQueryContainer(),
            $this->getConfig(),
            $this->getFinder()
        );
    }

    /**
     * @return BlockManagerInterface
     */
    public function getBlockManager()
    {
        return new BlockManager(
            $this->getCmsQueryContainer(),
            $this->getTouchFacade(),
            $this->getProvidedDependency(CmsDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

    /**
     * @return GlossaryKeyMappingManagerInterface
     */
    public function getGlossaryKeyMappingManager()
    {
        return new GlossaryKeyMappingManager(
            $this->getGlossaryFacade(),
            $this->getCmsQueryContainer(),
            $this->getTemplateManager(),
            $this->getPageManager(),
            $this->getProvidedDependency(CmsDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

}
