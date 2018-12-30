<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:46
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * WishList
 *
 * @ORM\Table(name="WishList")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\WishListRepository")
 */
class WishList
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */

    private $liblle;

    /**
     * @return string
     */
    public function getLiblle()
    {
        return $this->liblle;
    }

    /**
     * @param string $liblle
     */
    public function setLiblle($liblle)
    {
        $this->liblle = $liblle;
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



}