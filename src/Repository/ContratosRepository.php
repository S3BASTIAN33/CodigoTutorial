<?php

namespace App\Repository;

use App\Entity\Contratos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * @method Contratos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contratos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contratos[]    findAll()
 * @method Contratos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contratos::class);
    }

    // /**
    //  * @return Contratos[] Returns an array of Contratos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contratos
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function busfe(string $feu, string $fed)
    {
        return $this->getEntityManager()
        ->createQuery("SELECT distinct  c.monto,  cli.clientes 
                        FROM App:Contratos c
                        join c.clienteid cli
                        where c.fecha BETWEEN :feu AND :fed")
              
                        ->setParameter('feu',$feu)
                       ->setParameter('fed',$fed)
                        ->getResult()
                        ;
    }
   
}
