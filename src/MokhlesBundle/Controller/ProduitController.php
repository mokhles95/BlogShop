<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 25/12/2018
 * Time: 16:20
 */

namespace MokhlesBundle\Controller;


use EntityBundle\Entity\Produit;

use MokhlesBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitController extends Controller
{
    public function readAction(){
        $Produit=$this->getDoctrine()->getRepository( Produit::class)->findAll();

        return $this->render('@Mokhles/Default/read.html.twig',array('produits'=>$Produit));
    }

    public function createAction(Request $request)
    { //create an object to store our data after the form submission
        $produit = new Produit();
        //prepare the form with the function createForm()
        $form=$this->createForm(ProduitType::class,$produit);
        //extract the form answer from the received request
        $form->handleRequest($request);
        //if this form is valid
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $produit->setDate(new \DateTime());
            $em->persist($produit);
            $em->flush();
            return $this->redirect($this->generateUrl('read_Produit'));
        }
        return $this->render('@Mokhles/Default/create.html.twig',
            array(
                'form'=>$form->createView()
            ));
    }

    public function updateAction(Request $request, $id){
        //first step: //get the modele with $id with manager permission
        $em=$this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        //third step: // check is the from is sent
        if ($request->isMethod('POST')) {
            //update our object given the sent data in the request
            $produit->setLibelle ($request->get('libelle'));
            //fresh the data base
            $em->flush();
            //Redirect to the read
            return $this->redirectToRoute('read_Produit');
            //second step: // send the view to the user

        }
        return $this->render('@Mokhles/Default/update.html.twig', array( 'produits' => $produit
        ));

    }


    public function deleteAction($id) {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $produit= $em->getRepository(Produit::class)->find($id);
        //remove from the ORM
        $em->remove($produit);
        //update the data base
        $em->flush();
        return $this->redirectToRoute("read_Produit");
    }




}