<?php
/**
 * Created by PhpStorm.
 * User: Yosr
 * Date: 23/01/2019
 * Time: 21:48
 */

namespace YosrBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YosrBundle\Entity\SubCategArticle;
use YosrBundle\Form\SubCategArticleType;



class SubCategArticleController extends Controller
{
    public function afficherAction()
    {
        $em=$this->getDoctrine()->getManager();
        $SubCategArticle = $em->getRepository("YosrBundle:SubCategArticle")->findAll();
        return $this->render('@Yosr/SubCategArticle/afficher.html.twig',array("SubCategArticles"=>$SubCategArticle));
    }


    public function ajouterAction(Request $request){
        $SubCategArticle = new SubCategArticle();
        $form = $this->createForm(SubCategArticleType::class,$SubCategArticle);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($SubCategArticle);
            $em->flush();
            return $this->redirectToRoute('yosr_SubCategArticle_afficher');

        }
        return $this->render('@Yosr/SubCategArticle/ajouter.html.twig',array(
            "Form"=>$form->createView()
        ));
    }


    public function modifierAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $SubCategArticle = $em->getRepository('YosrBundle:SubCategArticle')->find($id);
        $form = $this->createForm(SubCategArticleType::class,$SubCategArticle);
        $form->handleRequest($request);   //éxecuter
        if($form->isSubmitted()&& $form->isValid()){
            $em->persist($SubCategArticle);
            $em->flush();
            return $this->redirectToRoute('yosr_SubCategArticle_afficher');
        }
        return $this->render('@Yosr/SubCategArticle/modifier.html.twig',
            array("Form"=>$form->createView()));
    }

    public function rechercherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $SubCategArticle = $em ->getRepository("YosrBundle:SubCategArticle")->findAll();
        if($request->isMethod('POST')) {
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $SubCategArticle = $em ->getRepository("YosrBundle:SubCategArticle")
                ->findBy(array("id"=>$id));
        }
        return $this->render('@Yosr/SubCategArticle/chercher.html.twig',array("SubCategArticles"=>$SubCategArticle));
    }


}