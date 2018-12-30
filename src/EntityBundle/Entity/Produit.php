<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:40
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="Produit")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="couleur", type="string", length=255)
     */

    private $couleur;

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

    /**
     * @var string
     *
     * @ORM\Column(name="libelleAn", type="string", length=255)
     */

    private $libelleAn;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleFr", type="string", length=255)
     */

    private $libelleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleIt", type="string", length=255)
     */

    private $libelleIt;

    /**
     * @var string
     *
     * @ORM\Column(name="descAn", type="string", length=255)
     */

    private $decAn;

    /**
     * @var string
     *
     * @ORM\Column(name="descFr", type="string", length=255)
     */


    private $decFr;

    /**
     * @var string
     *
     * @ORM\Column(name="descIt", type="string", length=255)
     */

    private $decIt;




    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */

    private $date;


    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */

    private $etat="disponible";




    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */

    private $prix;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="WishList")
     * @ORM\JoinColumn(name="wishList_id",referencedColumnName="id")
     */
    private $wishList;


    private $photos;

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param mixed $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }


    /**
     * @return string
     */
    public function getLibelleAn()
    {
        return $this->libelleAn;
    }

    /**
     * @param string $libelleAn
     */
    public function setLibelleAn($libelleAn)
    {
        $this->libelleAn = $libelleAn;
    }

    /**
     * @return string
     */
    public function getLibelleFr()
    {
        return $this->libelleFr;
    }

    /**
     * @param string $libelleFr
     */
    public function setLibelleFr($libelleFr)
    {
        $this->libelleFr = $libelleFr;
    }

    /**
     * @return string
     */
    public function getLibelleIt()
    {
        return $this->libelleIt;
    }

    /**
     * @param string $libelleIt
     */
    public function setLibelleIt($libelleIt)
    {
        $this->libelleIt = $libelleIt;
    }

    /**
     * @return string
     */
    public function getDecAn()
    {
        return $this->decAn;
    }

    /**
     * @param string $decAn
     */
    public function setDecAn($decAn)
    {
        $this->decAn = $decAn;
    }

    /**
     * @return string
     */
    public function getDecFr()
    {
        return $this->decFr;
    }

    /**
     * @param string $decFr
     */
    public function setDecFr($decFr)
    {
        $this->decFr = $decFr;
    }

    /**
     * @return string
     */
    public function getDecIt()
    {
        return $this->decIt;
    }

    /**
     * @param string $decIt
     */
    public function setDecIt($decIt)
    {
        $this->decIt = $decIt;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getWishList()
    {
        return $this->wishList;
    }

    /**
     * @param mixed $wishList
     */
    public function setWishList($wishList)
    {
        $this->wishList = $wishList;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }






}