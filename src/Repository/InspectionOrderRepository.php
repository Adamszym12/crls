<?php

namespace App\Repository;

use App\Entity\InspectionOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InspectionOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method InspectionOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method InspectionOrder[]    findAll()
 * @method InspectionOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InspectionOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InspectionOrder::class);
    }

    // /**
    //  * @return InspectionOrder[] Returns an array of InspectionOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InspectionOrder
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
