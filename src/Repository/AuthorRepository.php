<?php

namespace App\Repository;

use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Author|null find($id, $lockMode = null, $lockVersion = null)
 * @method Author|null findOneBy(array $criteria, array $orderBy = null)
 * @method Author[]    findAll()
 * @method Author[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    public function findAll($name = "")
    {
        if (!empty($name)) {
            return $this->findByName($name);
        }

        return $this->findBy(array(), array('name' => 'ASC'));
    }

    // /**
    //  * @return Author[] Returns an array of Author objects filtered by Name or Last Name
    //  */
    public function findByName(string $name = "")
    {
        return $this->createQueryBuilder('a')
            ->orWhere('a.name LIKE :name')
            ->orWhere('a.last_name LIKE :name')
            ->setParameter('name', "%" . $name . "%")
            ->orderBy('a.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Author
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
