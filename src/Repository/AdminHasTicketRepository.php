<?php

namespace App\Repository;

use App\Entity\AdminHasTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdminHasTicket|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminHasTicket|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminHasTicket[]    findAll()
 * @method AdminHasTicket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminHasTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminHasTicket::class);
    }

    // /**
    //  * @return AdminHasTicket[] Returns an array of AdminHasTicket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdminHasTicket
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
