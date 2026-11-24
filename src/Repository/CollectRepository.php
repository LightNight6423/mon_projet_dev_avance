<?php

namespace App\Repository;

use App\Entity\Collect;
use App\Entity\Utilisateur;
use App\Enum\StatutJeuEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Collect>
 */
class CollectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collect::class);
    }

/**
     * Liste des jeux en collection, filtrée par joueur et/ou statut (filtres optionnels).
     *
     * @return Collect[]
     */
    public function findByFilters(?Utilisateur $utilisateur, ?StatutJeuEnum $statut): array
    {
        $qb = $this->createQueryBuilder('c')
            ->addSelect('u', 'j')
            ->innerJoin('c.utilisateur', 'u')
            ->innerJoin('c.jeuVideo', 'j')
            ->orderBy('u.pseudo', 'ASC')
            ->addOrderBy('j.titre', 'ASC');

        if ($utilisateur !== null) {
            $qb->andWhere('c.utilisateur = :utilisateur')
                ->setParameter('utilisateur', $utilisateur);
        }

        if ($statut !== null) {
            $qb->andWhere('c.statut = :statut')
                ->setParameter('statut', $statut);
        }

        return $qb->getQuery()->getResult();
    }
}
