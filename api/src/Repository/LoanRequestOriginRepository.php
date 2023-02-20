<?php

namespace App\Repository;

use App\Entity\LoanRequestOrigin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LoanRequestOrigin>
 *
 * @method LoanRequestOrigin|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoanRequestOrigin|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoanRequestOrigin[]    findAll()
 * @method LoanRequestOrigin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoanRequestOriginRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoanRequestOrigin::class);
    }

    public function save(LoanRequestOrigin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LoanRequestOrigin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return LoanRequestOrigin[] Returns an array of LoanRequestOrigin objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LoanRequestOrigin
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
