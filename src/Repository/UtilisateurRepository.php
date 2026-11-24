<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilisateur>
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

/**
     * Tous les utilisateurs avec leur collection chargée (évite une requête par utilisateur).
     *
     * @return Utilisateur[]
     */
    public function findAllWithCollects(): array
    {
        return $this->createQueryBuilder('u')
            ->addSelect('c')
            ->leftJoin('u.collects', 'c')
            ->orderBy('u.nom', 'ASC')
            ->addOrderBy('u.prenom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
