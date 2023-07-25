<?php

namespace App\Repository;

use App\Entity\Projectsmanager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Projectsmanager>
 *
 * @method Projectsmanager|null find($id, $lockMode = null, $lockVersion = null)
 * @method Projectsmanager|null findOneBy(array $criteria, array $orderBy = null)
 * @method Projectsmanager[]    findAll()
 * @method Projectsmanager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsmanagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projectsmanager::class);
    }

//    /**
//     * @return Projectsmanager[] Returns an array of Projectsmanager objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Projectsmanager
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
