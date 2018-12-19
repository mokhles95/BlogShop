<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="SavedArticle")
     * @ORM\JoinColumn(name="savedA_id",referencedColumnName="id")
     */
    private $savedA;

    /**
     * @ORM\ManyToOne(targetEntity="SubCategArticle")
     * @ORM\JoinColumn(name="subCateg_id",referencedColumnName="id")
     */
    private $SubCateg;

    /**
     * @return mixed
     */
    public function getSubCateg()
    {
        return $this->SubCateg;
    }

    /**
     * @param mixed $SubCateg
     */
    public function setSubCateg($SubCateg)
    {
        $this->SubCateg = $SubCateg;
    }

    /**
     * @return mixed
     */
    public function getSavedA()
    {
        return $this->savedA;
    }

    /**
     * @param mixed $savedA
     */
    public function setSavedA($savedA)
    {
        $this->savedA = $savedA;
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

