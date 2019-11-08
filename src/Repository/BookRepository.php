<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    // get all books
    // default sorting by publish date descending
    public function findAll()
    {
        return $this->findBy(
                array(), 
                array('publish_date' => 'DESC')
            );
    }

    public function findByCriterias(array $criterias, array $orderBy, $limit = null, $offset = null){

        if (empty($criterias)) {
            return $this->findAll();
        }

        $joins = array();
        $wheres = array();
        $params = array();

        $qb = $this->createQueryBuilder('b');

        if (!empty($criterias['title'])) {
            $wheres[] = 'b.title LIKE :title';
            $params['title'] = "%". $criterias['title'] ."%";
        }
        
        if (!empty($criterias['author'])) {
            $joins['a'] = 'b.author';
            $wheres[] = 'a.name LIKE :author OR a.last_name LIKE :author';
            $params['author'] = "%". $criterias['author'] ."%";
        }

        if (!empty($criterias['translation'])) {
            $joins['t'] = 'b.translations';
            $wheres[] = 't.language LIKE :translation';
            $params['translation'] = "%". $criterias['translation'] ."%";
        }

        foreach ($joins as $joinAlias => $joinTable) {
            $qb->join($joinTable, $joinAlias);
        }

        foreach ($wheres as $whereItem) {
            $qb->andWhere($whereItem);
        }
        
        $qb->setParameters($params);

        foreach ($orderBy as $orderByFiled => $orderBySorting) {
            $qb->addOrderBy($orderByFiled, $orderBySorting);
        }

        $qb->setFirstResult($offset)
           ->setMaxResults($limit);

        $books = $qb->getQuery()
                    ->getResult();

        return $books;
    }

    // public function findByTitle(string $title){
        
    //     $books = $this->createQueryBuilder('b')
    //         ->where('b.title LIKE :title')
    //         ->setParameter(':title', "%". $title ."%")
    //         ->addOrderBy('b.publish_date', 'DESC')
    //         ->addOrderBy('b.title', 'ASC')
    //         ->getQuery()
    //         ->getResult();

    //     return $books;
    // }

    // public function findByAuthor(string $author){
        
    //     $books = $this->createQueryBuilder('b')
    //         ->join('b.author', 'a')
    //         ->where('a.name LIKE :author OR a.last_name LIKE :author')
    //         ->setParameter(':author', "%". $author ."%")
    //         ->addOrderBy('b.publish_date', 'DESC')
    //         ->addOrderBy('b.title', 'ASC')
    //         ->getQuery()
    //         ->getResult();

    //     return $books;
    // }

    // public function findByTranslation(string $translation){
        
    //     $books = $this->createQueryBuilder('b')
    //         ->leftJoin('b.translations', 't')
    //         ->where('t.language LIKE :translation')
    //         ->setParameter(':translation', "%". $translation ."%")
    //         ->addOrderBy('b.publish_date', 'DESC')
    //         ->addOrderBy('b.title', 'ASC')
    //         ->getQuery()
    //         ->getResult();

    //     return $books;
    // }

    // /**
    //  * @return Book[] Returns an array of Book objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
