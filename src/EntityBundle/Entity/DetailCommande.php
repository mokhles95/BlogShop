<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:33
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetailCommande
 *
 * @ORM\Table(name="DetailCammande")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\DetailCommandeRepository")
 */
class DetailCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumn(name="commande_id",referencedColumnName="id")
     */
    private $commande;

    /**
     * @return mixed
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param mixed $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param int $qte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
    }


}