<?php

namespace SofieneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SofieneBundle:Default:index.html.twig');
    }
}
