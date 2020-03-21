<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Produit::class);
        $this->paginator=$paginator;
    }

    /**
     * Récupure les produits en lien avec une recherche
     * @return PaginationInterface
     */

    public function findSearch(SearchData $search): PaginationInterface
    {
        $query=$this
            ->createQueryBuilder('p');

        if(!empty($search->q)){
            $query=$query
            ->andWhere('p.nom LIKE :q')
            ->setParameter('q',"%{$search->q}%");
       }
        if(!empty($search->min)){
            $query=$query
                ->andWhere('p.prix >= :min')
                ->setParameter('min',$search->min);
        }

        if(!empty($search->max)){
            $query=$query
                ->andWhere('p.prix <= :max')
                ->setParameter('max',$search->max);
        }
        $query=$query->getQuery();

        return $this->paginator->paginate(
            $query,
            $search->page,
            15
        );


    }
}
