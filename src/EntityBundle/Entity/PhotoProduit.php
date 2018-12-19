<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 19/12/2018
 * Time: 00:03
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * PhotoProduit
 *
 * @ORM\Table(name="PhotoProduit")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\PhotoPRepository")
 */

class PhotoProduit
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */

    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */

    private $couleur;
    /**
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumn(name="produit_id",referencedColumnName="id")
     */
    private $produit;

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
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param string $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }


}