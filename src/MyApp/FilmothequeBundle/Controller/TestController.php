<?php

namespace MyApp\FilmothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TestController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('FilmothequeBundle:Test:index.html.twig');
    }
}
