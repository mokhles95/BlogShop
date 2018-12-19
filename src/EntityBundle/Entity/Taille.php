<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:49
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * taille
 *
 * @ORM\Table(name="Taille")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\TailleRepository")
 */
class Taille
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