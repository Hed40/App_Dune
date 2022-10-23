<?php

namespace App\Repository;

use App\Entity\AstreintesAndrew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AstreintesAndrew>
 *
 * @method AstreintesAndrew|null find($id, $lockMode = null, $lockVersion = null)
 * @method AstreintesAndrew|null findOneBy(array $criteria, array $orderBy = null)
 * @method AstreintesAndrew[]    findAll()
 * @method AstreintesAndrew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AstreintesAndrewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AstreintesAndrew::class);
    }

    public function save(AstreintesAndrew $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AstreintesAndrew $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AstreintesAndrew[] Returns an array of AstreintesAndrew objects
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

//    public function findOneBySomeField($value): ?AstreintesAndrew
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
