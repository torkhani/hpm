<?php

namespace App\Repository;

use App\Entity\FinancialAssetsType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FinancialAssetsType>
 *
 * @method FinancialAssetsType|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinancialAssetsType|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinancialAssetsType[]    findAll()
 * @method FinancialAssetsType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinancialAssetsTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinancialAssetsType::class);
    }

    public function save(FinancialAssetsType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FinancialAssetsType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FinancialAssetsType[] Returns an array of FinancialAssetsType objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FinancialAssetsType
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
