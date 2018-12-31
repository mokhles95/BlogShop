<?php

namespace WassimBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EntityBundle\Entity\AuthorizedComments;
use EntityBundle\Entity\Comments;
use Symfony\Component\HttpFoundation\Request;

class CommentingSystemController extends Controller
{
    public function indexAction( Request $request)
    {
        if($request->request->count() > 0)
        {
            if ($request->request->get('userid')!="" && $request->request->get('articleid')!="" )
            {
                $userid=$request->request->get('userid');
                $articleid=$request->request->get('articleid');
                return $this->redirectToRoute("commenting_system_afficher",array('userid' => $userid ,'articleid' => $articleid ));
            }
        }
        return $this->render('@Wassim/CommentingSystem/index.html.twig');
    }
    public function afficherAction($userid,$articleid,Request $request)
    {
        $rep=$this->getDoctrine()->getManager();
        $AuthorizedComments = $rep->getRepository("EntityBundle:AuthorizedComments")->findAll();
        $Comments = $rep->getRepository("EntityBundle:Comments")->findBy(array('idArticle' => $articleid));
        $IsCommented = 0;
        if($rep->getRepository("EntityBundle:Comments")->findOneBy(array('idUser' => $userid , 'idArticle' => $articleid)))
        {
            $IsCommented = 1;
        }
        return $this->render('@Wassim/CommentingSystem/afficher.html.twig',array('userid' => $userid ,'articleid' => $articleid ,"AuthorizedComments"=>$AuthorizedComments,"Comments"=>$Comments, 'isCommented'=>$IsCommented));
    }
}

