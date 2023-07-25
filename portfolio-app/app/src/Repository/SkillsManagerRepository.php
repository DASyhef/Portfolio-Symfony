<?php

namespace App\Repository;

use App\Entity\SkillsManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SkillsManager>
 *
 * @method SkillsManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillsManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillsManager[]    findAll()
 * @method SkillsManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillsManagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillsManager::class);
    }

//    /**
//     * @return SkillsManager[] Returns an array of SkillsManager objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SkillsManager
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
