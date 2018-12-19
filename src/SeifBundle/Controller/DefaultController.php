<?php

namespace SeifBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SeifBundle:Default:index.html.twig');
    }
}
