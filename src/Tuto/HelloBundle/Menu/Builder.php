<?php

namespace Tuto\HelloBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'HelloBundleIndex'));
        $menu->addChild('About Me', array(
            'route' => 'HelloBundleName',
            'routeParameters' => array('name' => 'Jon')
        ));

        return $menu;
    }
}