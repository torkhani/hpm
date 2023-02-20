<?php

namespace App\Repository;

use App\Entity\LoanRequestFlag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LoanRequestFlag>
 *
 * @method LoanRequestFlag|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoanRequestFlag|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoanRequestFlag[]    findAll()
 * @method LoanRequestFlag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoanRequestFlagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoanRequestFlag::class);
    }

    public function save(LoanRequestFlag $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LoanRequestFlag $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return LoanRequestFlag[] Returns an array of LoanRequestFlag objects
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

//    public function findOneBySomeField($value): ?LoanRequestFlag
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
