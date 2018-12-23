<?php
/**
 * Created by PhpStorm.
 * User: Yosr
 * Date: 23/12/2018
 * Time: 13:17
 */

namespace EntityBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EntityBundle\Entity\CategoryArticle;
use EntityBundle\Form\CategoryArticleType;


class CategoryArticleController extends Controller
{

    public function afficherAction()
    {
        $em=$this->getDoctrine()->getManager();
        $CategoryArticle = $em->getRepository("EntityBundle:CategoryArticle")->findAll();
        return $this->render('@Entity/CategoryArticle/afficher.html.twig',array("CategoryArticles"=>$CategoryArticle));
    }

    public function rechercherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $CategoryArticle = $em ->getRepository("EntityBundle:CategoryArticle")->findAll();
        if($request->isMethod('POST')) {
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $CategoryArticle = $em ->getRepository("EntityBundle:CategoryArticle")
                ->findBy(array("id"=>$id));
        }
        return $this->render('@Entity/CategoryArticle/chercher.html.twig',array("CategoryArticles"=>$CategoryArticle));
    }

    public function ajouterAction(Request $request){
        $CategoryArticle = new CategoryArticle();
        $form = $this->createForm(CategoryArticleType::class,$CategoryArticle);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($CategoryArticle);
            $em->flush();
            return $this->redirectToRoute('entity_CategArticle_afficher');

        }
        return $this->render('@Entity/CategoryArticle/ajouter.html.twig',array(
            "Form"=>$form->createView()
        ));
    }

    public function modifierAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $CategoryArticle = $em->getRepository('EntityBundle:CategoryArticle')->find($id);
        $form = $this->createForm(CategoryArticleType::class,$CategoryArticle);
        $form->handleRequest($request);   //éxecuter
        if($form->isSubmitted()&& $form->isValid()){
            $em->persist($CategoryArticle);
            $em->flush();
            return $this->redirectToRoute('entity_CategArticle_afficher');
        }
        return $this->render('@Entity/CategoryArticle/modifier.html.twig',
            array("Form"=>$form->createView()));
    }


    public function supprimerAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $CategoryArticle = $em ->getRepository("EntityBundle:CategoryArticle") ->find($id);
        $em->remove($CategoryArticle);
        $em->flush();
        return $this->redirectToRoute('entity_CategArticle_afficher');
    }

}