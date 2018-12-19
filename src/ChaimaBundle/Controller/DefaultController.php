<?php

namespace ChaimaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChaimaBundle:Default:index.html.twig');
    }
}
