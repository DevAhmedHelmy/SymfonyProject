<?php

namespace App\Repository;

use App\Entity\CartShopping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CartShopping|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartShopping|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartShopping[]    findAll()
 * @method CartShopping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartShoppingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CartShopping::class);
    }

    // /**
    //  * @return CartShopping[] Returns an array of CartShopping objects
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
    public function findOneBySomeField($value): ?CartShopping
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
