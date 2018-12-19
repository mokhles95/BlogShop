<?php

namespace WassimBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WassimBundle:Default:index.html.twig');
    }
}
