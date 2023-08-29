<?php

namespace App\Repository;

use App\Entity\Comptes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comptes>
 *
 * @method Comptes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comptes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comptes[]    findAll()
 * @method Comptes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComptesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comptes::class);
    }

//    /**
//     * @return Comptes[] Returns an array of Comptes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Comptes
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
