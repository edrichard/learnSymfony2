<?php

namespace Tuto\BookBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'BookBundleHomepage'));
        $menu->addChild('Books', array('route' => 'book'));
        $menu->addChild('Authors', array('route' => 'author'));
        
        return $menu;
    }
}