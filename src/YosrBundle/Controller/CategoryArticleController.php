<?php
/**
 * Created by PhpStorm.
 * User: Yosr
 * Date: 23/12/2018
 * Time: 13:17
 */

namespace YosrBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YosrBundle\Entity\CategoryArticle;
use YosrBundle\Form\CategoryArticleType;


class CategoryArticleController extends Controller
{

    public function afficherAction()
    {
        $em=$this->getDoctrine()->getManager();
        $CategoryArticle = $em->getRepository("YosrBundle:CategoryArticle")->findAll();
        return $this->render('@Yosr/CategoryArticle/afficher.html.twig',array("CategoryArticles"=>$CategoryArticle));
    }

    public function rechercherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $CategoryArticle = $em ->getRepository("YosrBundle:CategoryArticle")->findAll();
        if($request->isMethod('POST')) {
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $CategoryArticle = $em ->getRepository("YosrBundle:CategoryArticle")
                ->findBy(array("id"=>$id));
        }
        return $this->render('@Yosr/CategoryArticle/chercher.html.twig',array("CategoryArticles"=>$CategoryArticle));
    }

    public function ajouterAction(Request $request){
        $CategoryArticle = new CategoryArticle();
        $form = $this->createForm(CategoryArticleType::class,$CategoryArticle);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($CategoryArticle);
            $em->flush();
            return $this->redirectToRoute('yosr_CategArticle_afficher');

        }
        return $this->render('@Yosr/CategoryArticle/ajouter.html.twig',array(
            "Form"=>$form->createView()
        ));
    }

    public function modifierAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $CategoryArticle = $em->getRepository('YosrBundle:CategoryArticle')->find($id);
        $form = $this->createForm(CategoryArticleType::class,$CategoryArticle);
        $form->handleRequest($request);   //éxecuter
        if($form->isSubmitted()&& $form->isValid()){
            $em->persist($CategoryArticle);
            $em->flush();
            return $this->redirectToRoute('yosr_CategArticle_afficher');
        }
        return $this->render('@Yosr/CategoryArticle/modifier.html.twig',
            array("Form"=>$form->createView()));
    }


    public function supprimerAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $CategoryArticle = $em ->getRepository("YosrBundle:CategoryArticle") ->find($id);
        $em->remove($CategoryArticle);
        $em->flush();
        return $this->redirectToRoute('yosr_CategArticle_afficher');
    }

}