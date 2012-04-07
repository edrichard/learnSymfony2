<?php

namespace Tuto\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('BookBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function chooseLanguageAction($language = null)
    {
        if($language != null){
            // On enregistre la langue en session
            $this->container->get('session')->setLocale($language);
        }

        // on tente de rediriger vers la page d'origine
        $url = $this->container->get('request')->headers->get('referer');  var_dump($url); 
        if(empty($url)) {
            $url = $this->container->get('router')->generate('BookBundleHomepage');
        }     
        return new RedirectResponse($url);
    }
}
