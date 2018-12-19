<?php

namespace YosrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YosrBundle:Default:index.html.twig');
    }
}
