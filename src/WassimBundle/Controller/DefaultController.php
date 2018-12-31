<?php

namespace WassimBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EntityBundle\Entity\AuthorizedComments;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller
{
    public function indexAction( Request $request)
    {
        $rep=$this->getDoctrine()->getManager();
        if($request->request->count() > 0)
    {
        if ($request->request->get('comment')!="")
        {   $AuthorizedComment= new AuthorizedComments();

            if(!$rep->getRepository("EntityBundle:AuthorizedComments")->findOneByComment($request->request->get('comment'))) {
                $AuthorizedComment->setComment($request->request->get('comment'));
                $rep->persist($AuthorizedComment);
                $rep->flush();
            }
        }
    }
        $AuthorizedComments = $rep->getRepository("EntityBundle:AuthorizedComments")->findAll();

        return $this->render('@Wassim/Default/index.html.twig',array("AuthorizedComments"=>$AuthorizedComments));
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function editAction($id, Request $request)
    {   $AuthorizedComment = NULL;
        $rep=$this->getDoctrine()->getManager();
        $AuthorizedComment = $rep->getRepository("EntityBundle:AuthorizedComments")->find($id);
        if($AuthorizedComment==NULL) {

            return $this->redirectToRoute("authorized_comments_afficher");
        }

        if($request->request->count() > 0)
        {
           if ($request->request->get('comment')!="")
           {
               $AuthorizedComment->setComment($request->request->get('comment'));
               $rep->persist($AuthorizedComment);
               $rep->flush();

           }
        }


        return $this->render('@Wassim/Default/edit.html.twig',array("AuthorizedComment"=>$AuthorizedComment));
    }
    public function deleteAction($id)
    {

        $rep=$this->getDoctrine()->getManager();
        $AuthorizedComment = $rep->getRepository("EntityBundle:AuthorizedComments")->find($id);
        $rep->remove($AuthorizedComment);
        $rep->flush();
        return $this->redirectToRoute("authorized_comments_afficher");
    }
}
