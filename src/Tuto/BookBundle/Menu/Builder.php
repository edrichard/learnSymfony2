<?php

namespace Tuto\BookBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options, Translator $translator)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'BookBundleHomepage'))
             ->setLabel($translator->trans('menu.home'));
        $menu->addChild('Books', array('route' => 'book'));
        $menu->addChild('Authors', array('route' => 'author'));
        
        return $menu;
    }
}