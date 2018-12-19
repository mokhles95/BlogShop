<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 19/12/2018
 * Time: 00:01
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitEn
 *
 * @ORM\Table(name="ProduiEn")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\ProduiEnRepository")
 */

class ProduitEn
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
     * @ORM\OneToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id",referencedColumnName="id")
     */
    private $article;

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
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