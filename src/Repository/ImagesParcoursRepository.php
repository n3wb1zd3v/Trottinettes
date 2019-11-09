<?php

namespace App\Repository;

use App\Entity\ImagesParcours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ImagesParcours|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesParcours|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesParcours[]    findAll()
 * @method ImagesParcours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesParcoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesParcours::class);
    }

    // /**
    //  * @return ImagesParcours[] Returns an array of ImagesParcours objects
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
    public function findOneBySomeField($value): ?ImagesParcours
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
