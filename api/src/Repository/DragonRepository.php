<?php

namespace App\Repository;

use App\Entity\Dragon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dragon>
 *
 * @method Dragon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dragon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dragon[]    findAll()
 * @method Dragon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DragonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dragon::class);
    }

//    /**
//     * @return Dragon[] Returns an array of Dragon objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Dragon
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
