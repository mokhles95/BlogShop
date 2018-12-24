<?php
/**
 * Created by PhpStorm.
 * User: Yosr
 * Date: 22/12/2018
 * Time: 23:16
 */

namespace EntityBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EntityBundle\Entity\Article;
use EntityBundle\Form\ArticleType;


class ArticleController extends Controller
{

    public function afficherAction()
    {
        $em=$this->getDoctrine()->getManager();
        $Article = $em->getRepository("EntityBundle:Article")->findAll();
        return $this->render('@Entity/Article/afficher.html.twig',array("articles"=>$Article));
    }

    public function rechercherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Article = $em ->getRepository("EntityBundle:Article")->findAll();
        if($request->isMethod('POST')) {
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $Article = $em ->getRepository("EntityBundle:Article")
                ->findBy(array("id"=>$id));
        }
        return $this->render('@Entity/Article/chercher.html.twig',array("articles"=>$Article));
    }

    public function ajouterAction(Request $request){
        $Article = new Article();
        $form = $this->createForm(ArticleType::class,$Article);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($Article);
            $em->flush();
            return $this->redirectToRoute('entity_Article_afficher');

        }
        return $this->render('@Entity/Article/ajouter.html.twig',array(
            "Form"=>$form->createView()
        ));
    }

    public function modifierAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository('EntityBundle:Article')->find($id);
        $form = $this->createForm(ArticleType::class,$Article);
        $form->handleRequest($request);   //éxecuter
        if($form->isSubmitted()&& $form->isValid()){
            $em->persist($Article);
            $em->flush();
            return $this->redirectToRoute('entity_Article_afficher');
        }
        return $this->render('@Entity/Article/modifier.html.twig',
            array("Form"=>$form->createView()));
    }

    public function supprimerAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();   //créer une instance de l'entité manager (action avec la base )
        $Article = $em ->getRepository("EntityBundle:Article") ->find($id);
        $em->remove($Article); //supprime le modéle
        $em->flush();   //actualiser
        return $this->redirectToRoute('entity_Article_afficher');
    }

}