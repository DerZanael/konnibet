<?php

namespace App\Repository;

use App\Entity\StreamPlatform;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StreamPlatform|null find($id, $lockMode = null, $lockVersion = null)
 * @method StreamPlatform|null findOneBy(array $criteria, array $orderBy = null)
 * @method StreamPlatform[]    findAll()
 * @method StreamPlatform[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StreamPlatformRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StreamPlatform::class);
    }

    // /**
    //  * @return StreamPlatform[] Returns an array of StreamPlatform objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StreamPlatform
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
