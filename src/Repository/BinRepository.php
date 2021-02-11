<?php

namespace App\Repository;

use App\Entity\Bin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @method Bin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bin[]    findAll()
 * @method Bin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BinRepository extends ServiceEntityRepository
{
    private $glassContainer;

    public function __construct(ManagerRegistry $registry, HttpClientInterface $glassContainer )
    {
        parent::__construct($registry, Bin::class);
        $this->glassContainer = $glassContainer;
    }

    // /**
    //  * @return Bin[] Returns an array of Bin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bin
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
