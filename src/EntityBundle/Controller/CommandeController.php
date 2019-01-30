<?php

namespace EntityBundle\Controller;

use EntityBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Commande controller.
 *
 */
class CommandeController extends Controller
{
    /**
     * Lists all commande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('EntityBundle:Commande')->findAll();

        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Finds and displays a commande entity.
     *
     */
    public function showAction(Commande $commande)
    {

        return $this->render('commande/show.html.twig', array(
            'commande' => $commande,
        ));
    }

    public function ConfirmerAction($id)
    {
         $name= "ch";

         $mailer= $this->get('swiftmailer.mailer.default') ;
        $em = $this->getDoctrine()->getManager();

         $em->getRepository('EntityBundle:Commande')->Confirmer($id);




        $message = (new \Swift_Message('Livraison '))
            ->setFrom('chaymabn@yahoo.fr')
            ->setTo('chayma.bennasser@yahoo.com')
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'commande/mail.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            );

        $mailer->send($message);


        $commandes = $em->getRepository('EntityBundle:Commande')->findAll();







        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,
        ));

    }
}
