<?php

namespace EntityBundle\Controller;

use EntityBundle\Entity\DetailCommande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detailcommande controller.
 *
 */
class DetailCommandeController extends Controller
{
    /**
     * Lists all detailCommande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detailCommandes = $em->getRepository('EntityBundle:DetailCommande')->findAll();

        return $this->render('detailcommande/index.html.twig', array(
            'detailCommandes' => $detailCommandes,
        ));
    }

    /**
     * Creates a new detailCommande entity.
     *
     */
    public function newAction(Request $request)
    {
        $detailCommande = new Detailcommande();
        $form = $this->createForm('EntityBundle\Form\DetailCommandeType', $detailCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailCommande);
            $em->flush();

            return $this->redirectToRoute('detailcommande_show', array('id' => $detailCommande->getId()));
        }

        return $this->render('detailcommande/new.html.twig', array(
            'detailCommande' => $detailCommande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detailCommande entity.
     *
     */
    public function showAction(DetailCommande $detailCommande)
    {
        $deleteForm = $this->createDeleteForm($detailCommande);

        return $this->render('detailcommande/show.html.twig', array(
            'detailCommande' => $detailCommande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detailCommande entity.
     *
     */
    public function editAction(Request $request, DetailCommande $detailCommande)
    {
        $deleteForm = $this->createDeleteForm($detailCommande);
        $editForm = $this->createForm('EntityBundle\Form\DetailCommandeType', $detailCommande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detailcommande_edit', array('id' => $detailCommande->getId()));
        }

        return $this->render('detailcommande/edit.html.twig', array(
            'detailCommande' => $detailCommande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detailCommande entity.
     *
     */
    public function deleteAction(Request $request, DetailCommande $detailCommande)
    {
        $form = $this->createDeleteForm($detailCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detailCommande);
            $em->flush();
        }

        return $this->redirectToRoute('detailcommande_index');
    }

    /**
     * Creates a form to delete a detailCommande entity.
     *
     * @param DetailCommande $detailCommande The detailCommande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetailCommande $detailCommande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detailcommande_delete', array('id' => $detailCommande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function DetailsAction($id)
    {
        $em= $this->getDoctrine()->getManager() ;
        $details= $em->getRepository('EntityBundle:DetailCommande')->findBy(array('commande'=>$id)) ;

        return $this->render('detailcommande/details.html.twig', array(
            'details' => $details,
        ));


    }

}
