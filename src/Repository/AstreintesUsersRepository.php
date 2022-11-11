<?php

namespace App\Repository;

use App\Entity\AstreintesUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AstreintesUsers>
 *
 * @method AstreintesUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method AstreintesUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method AstreintesUsers[]    findAll()
 * @method AstreintesUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AstreintesUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AstreintesUsers::class);
    }

    public function save(AstreintesUsers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AstreintesUsers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AstreintesUsers[] Returns an array of AstreintesUsers objects
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

//    public function findOneBySomeField($value): ?AstreintesUsers
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
