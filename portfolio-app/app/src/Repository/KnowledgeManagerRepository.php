<?php

namespace App\Repository;

use App\Entity\KnowledgeManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KnowledgeManager>
 *
 * @method KnowledgeManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method KnowledgeManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method KnowledgeManager[]    findAll()
 * @method KnowledgeManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KnowledgeManagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KnowledgeManager::class);
    }

//    /**
//     * @return KnowledgeManager[] Returns an array of KnowledgeManager objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?KnowledgeManager
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
