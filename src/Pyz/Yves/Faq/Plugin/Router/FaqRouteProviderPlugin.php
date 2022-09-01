<?php

namespace Pyz\Yves\Faq\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\Route;
use Spryker\Yves\Router\Route\RouteCollection;

class FaqRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    public const ROUTE_FAQ_INDEX = 'faq-index';
    public const ROUTE_FAQ_VOTE_INDEX = 'faq-vote-index';

    /**
     * @param RouteCollection $routeCollection
     * @return RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addFaqIndexRoute($routeCollection);
        $routeCollection = $this->addFaqVoteRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param RouteCollection $routeCollection
     * @return RouteCollection
     */
    protected function addFaqIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/faq', 'Faq', 'Index', 'indexAction');
        $routeCollection->add(self::ROUTE_FAQ_INDEX, $route);

        return $routeCollection;
    }

    /**
     * @param RouteCollection $routeCollection
     * @return RouteCollection
     */
    private function addFaqVoteRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/faq/vote', 'Faq', 'FaqVote', 'indexAction');
        $routeCollection->add(self::ROUTE_FAQ_VOTE_INDEX, $route);

        return $routeCollection;
    }
}
