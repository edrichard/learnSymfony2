<?php

namespace Tuto\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TestController extends Controller
{
    
    function indexAction(){
        return $this->render("HelloBundle:Test:index.html.twig");
    }
    
    public function nameAction($name) {
        return $this->render('HelloBundle:Test:name.html.twig', array('name' => $name));
    }
}
