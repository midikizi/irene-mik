<?php

namespace App\Repository;

use App\Entity\Tontines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tontines>
 *
 * @method Tontines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tontines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tontines[]    findAll()
 * @method Tontines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TontinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tontines::class);
    }

//    /**
//     * @return Tontines[] Returns an array of Tontines objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tontines
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
