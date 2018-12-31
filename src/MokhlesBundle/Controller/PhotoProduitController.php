<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 28/12/2018
 * Time: 00:25
 */

namespace MokhlesBundle\Controller;

use EntityBundle\Entity\PhotoProduit;
use MokhlesBundle\Form\PhotoProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PhotoProduitController extends Controller
{
    public function readAction(){
        $photo=$this->getDoctrine()->getRepository( PhotoProduit::class)->findAll();
        return $this->render('@Mokhles/Photo/read.html.twig',array('photos'=>$photo));
    }


    public function createAction(Request $request)
    { //create an object to store our data after the form submission
        $photo = new PhotoProduit();
        //prepare the form with the function createForm()
        $form=$this->createForm(PhotoProduitType::class,$photo);
        //extract the form answer from the received request
        $form->handleRequest($request);
        //if this form is valid
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($photo);
            $em->flush();
            return $this->redirect($this->generateUrl('create_Photo'));
        }
        return $this->render('@Mokhles/Photo/create.html.twig',
            array(
                'form'=>$form->createView()
            ));
    }


    public function updateAction(Request $request, $id){
        //first step: //get the modele with $id with manager permission
        $em=$this->getDoctrine()->getManager();
        $photo = $em->getRepository(PhotoProduit::class)->find($id);
        //third step: // check is the from is sent
        if ($request->isMethod('POST')) {
            //update our object given the sent data in the request
            $photo->setLibelle ($request->get('libelle'));
            $photo->setNom ($request->get('nom'));
            //fresh the data base
            $em->flush();
            //Redirect to the read
            return $this->redirectToRoute('read_Photo');
            //second step: // send the view to the user
        }
        return $this->render('@Mokhles/Photo/update.html.twig', array( 'photos' => $photo
        ));

    }


    public function deleteAction($id) {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $photo= $em->getRepository(PhotoProduit::class)->find($id);
        //remove from the ORM
        $em->remove($photo);
        //update the data base
        $em->flush();
        return $this->redirectToRoute("read_Photo");
    }


}