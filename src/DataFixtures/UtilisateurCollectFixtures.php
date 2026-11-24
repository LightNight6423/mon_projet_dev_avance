<?php

namespace App\DataFixtures;

use App\Entity\Collect;
use App\Entity\JeuVideo;
use App\Entity\Utilisateur;
use App\Enum\StatutJeuEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurCollectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();

        $jeux = $manager->getRepository(JeuVideo::class)->findAll();
        if (count($jeux) < 8) {
            throw new \RuntimeException('Il faut au moins 8 jeux en base avant de charger ces fixtures.');
        }

        // 6 utilisateurs : 4 avec > 5 jeux, 1 avec 3 jeux, 1 sans collection
        $data = [
            ['Alice',   'Martin',  'alice_m', 'alice@example.com',   '1998-03-12', 8],
            ['Bastien', 'Durand',  'bast_d',  'bastien@example.com', '2000-07-25', 7],
            ['Chloé',   'Bernard', 'chloe_b', 'chloe@example.com',   '1995-11-02', 6],
            ['David',   'Petit',   'david_p', 'david@example.com',   '2001-01-30', 6],
            ['Emma',    'Robert',  'emma_r',  'emma@example.com',    '1999-09-18', 3],
            ['Farid',   'Moreau',  'farid_m', 'farid@example.com',   '2002-05-07', 0],
        ];

        $statuts = StatutJeuEnum::cases();

        foreach ($data as [$prenom, $nom, $pseudo, $mail, $naissance, $nbJeux]) {
            $user = (new Utilisateur())
                ->setPrenom($prenom)
                ->setNom($nom)
                ->setPseudo($pseudo)
                ->setMail($mail)
                ->setDateNaissance(new \DateTimeImmutable($naissance))
                ->setImageProfil(null)
                ->setCreatedAt($now)
                ->setUpdatedAt($now);
            $manager->persist($user);

            // jeux distincts pour cet utilisateur
            $selection = $nbJeux > 0 ? (array) array_rand($jeux, $nbJeux) : [];

            foreach ($selection as $index) {
                $jeu = $jeux[$index];
                $dateAchat = new \DateTimeImmutable(sprintf('-%d days', random_int(1, 700)));

                $collect = (new Collect())
                    ->setUtilisateur($user)
                    ->setJeuVideo($jeu)
                    ->setStatut($statuts[array_rand($statuts)])
                    ->setDateModifStatut($dateAchat)
                    ->setPrixAchat((float) $jeu->getPrix())
                    ->setDateAchat($dateAchat)
                    ->setCommentaire('Ajouté par les fixtures')
                    ->setCreatedAt($now)
                    ->setUpdatedAt($now);
                $manager->persist($collect);
            }
        }

        $manager->flush();
    }
}