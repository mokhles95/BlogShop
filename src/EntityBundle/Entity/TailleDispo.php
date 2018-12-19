<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:52
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * tailleDispo
 *
 * @ORM\Table(name="TailleDispo")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\TailleDispoRepository")
 */

class TailleDispo
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
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumn(name="produit_id",referencedColumnName="id")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="Taille")
     * @ORM\JoinColumn(name="taille_id",referencedColumnName="id")
     */
    private $taille;

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



}