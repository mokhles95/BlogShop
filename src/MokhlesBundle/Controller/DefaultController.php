<?php

namespace MokhlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MoukhlesBundle:Default:index.html.twig');
    }
}
