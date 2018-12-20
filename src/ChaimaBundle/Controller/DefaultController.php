<?php

namespace ChaimaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Chaima/Default/index.html.twig');
    }
}
