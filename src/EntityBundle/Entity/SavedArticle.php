<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:37
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * SavedArticle
 *
 * @ORM\Table(name="SavedArticle")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\SavedArticleRepository")
 */
class SavedArticle
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
     * @ORM\OneToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id",referencedColumnName="id")
     */
    private $article;

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