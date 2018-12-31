<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 30/12/2018
 * Time: 16:21
 */

namespace MokhlesBundle\Controller;

use EntityBundle\Entity\Taille;

use MokhlesBundle\Form\TailleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TailleProduitController extends Controller
{
    public function readAction(){
        $taille=$this->getDoctrine()->getRepository( Taille::class)->findAll();

        return $this->render('@Mokhles/Taille/read.html.twig',array('tailles'=>$taille));
    }

    public function createAction(Request $request)
    { //create an object to store our data after the form submission
        $taille = new Taille();
        //prepare the form with the function createForm()
        $form=$this->createForm(TailleType::class,$taille);
        //extract the form answer from the received request
        $form->handleRequest($request);
        //if this form is valid
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($taille);
            $em->flush();
            return $this->redirect($this->generateUrl('read_Taille'));
        }
        return $this->render('@Mokhles/Taille/create.html.twig',
            array(
                'form'=>$form->createView()
            ));
    }

    public function archiverAction( $id){
        //first step: //get the modele with $id with manager permission
        $em=$this->getDoctrine()->getManager();
        $taille = $em->getRepository(Taille::class)->find($id);
        //third step: // check is the from is sent

            //update our object given the sent data in the request
            $taille->setEtat("inactif");
            //fresh the data base
            $em->flush();
            //Redirect to the read
            return $this->redirectToRoute('read_Taille');
            //second step: // send the view to the user


        return $this->render('@Mokhles/Taille/update.html.twig', array( 'tailles' => $taille
        ));

    }
    public function desarchiverAction( $id){
        //first step: //get the modele with $id with manager permission
        $em=$this->getDoctrine()->getManager();
        $taille = $em->getRepository(Taille::class)->find($id);
        //third step: // check is the from is sent

        //update our object given the sent data in the request
        $taille->setEtat("actif");
        //fresh the data base
        $em->flush();
        //Redirect to the read
        return $this->redirectToRoute('read_Taille');
        //second step: // send the view to the user


        return $this->render('@Mokhles/Taille/update.html.twig', array( 'tailles' => $taille
        ));

    }

    public function deleteAction($id) {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $taille= $em->getRepository(Taille::class)->find($id);
        //remove from the ORM
        $em->remove($taille);
        //update the data base
        $em->flush();
        return $this->redirectToRoute("read_Produit");
    }

}