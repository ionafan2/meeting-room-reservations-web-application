<?php

namespace Application\Bundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Main menu builder.
 * For render menu you can use this code:
 * {{ knp_menu_render('main') }}
 */
class MenuBuilder
{

    private $factory;

    /**
     * Constructor injection
     *
     * @param FactoryInterface $factory
     *
     * @return \Application\Bundle\Menu\MenuBuilder
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Main menu
     *
     * @param Request $request
     *
     * @return \Knp\Menu\MenuItem
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $menu->setCurrent($request->getRequestUri());

        $menu->addChild('About', array('route' => 'application_default_homepage'));
        $menu->addChild('Contact us', array('route' => 'application_default_homepage'));

        return $menu;
    }
}
