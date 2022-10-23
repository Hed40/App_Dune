<?php

namespace App\Repository;

use App\Entity\AstreintesMatylde;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AstreintesMatylde>
 *
 * @method AstreintesMatylde|null find($id, $lockMode = null, $lockVersion = null)
 * @method AstreintesMatylde|null findOneBy(array $criteria, array $orderBy = null)
 * @method AstreintesMatylde[]    findAll()
 * @method AstreintesMatylde[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AstreintesMatyldeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AstreintesMatylde::class);
    }

    public function save(AstreintesMatylde $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AstreintesMatylde $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AstreintesMatylde[] Returns an array of AstreintesMatylde objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AstreintesMatylde
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
