<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 18/12/2018
 * Time: 23:37
 */

namespace EntityBundle\Repository;


class DetailCommandeRepository extends \Doctrine\ORM\EntityRepository
{

    public function findCom($id)
    {
        $qb= $this->createQueryBuilder('d')
            ->select('all')
            ->where('d.commande_id = :id')
            ->setParameter('id',$id)
            ->getQuery();
        return $qb ;
    }

}