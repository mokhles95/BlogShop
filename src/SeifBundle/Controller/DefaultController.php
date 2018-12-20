<?php

namespace SeifBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Seif/Default/index.html.twig');
    }
}
