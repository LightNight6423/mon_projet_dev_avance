<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\Editeur;
use App\Entity\JeuVideo;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // =====================================================
        // Créer les genres
        // =====================================================

        // Genre ACTION : Jeux d'action : plateforme, combat, tir
        $genreAction = new Genre();
        $this->initDates($genreAction);
        $genreAction->setNom('Action');
        $genreAction->setDescription('Jeux d\'action : jeux de plateforme, combat, tir (FPS, TPS, ...)');
        $manager->persist($genreAction);

        // Genre AVENTURE : aventure narrative, point and click
        $genreAventure = new Genre();
        $this->initDates($genreAventure);
        $genreAventure->setNom('Aventure');
        $genreAventure->setDescription('Jeux d\'aventure narrative, point and click...');
        $manager->persist($genreAventure);

        // Genre ACTION_AVENTURE : infiltration, survival
        $genreActionAventure = new Genre();
        $this->initDates($genreActionAventure);
        $genreActionAventure->setNom('Action-Aventure');
        $genreActionAventure->setDescription('Jeux d\'action-aventure (infiltration, survival, ...)');
        $manager->persist($genreActionAventure);

        // Genre RPG : jeux de rôle
        $genreRpg = new Genre();
        $this->initDates($genreRpg);
        $genreRpg->setNom('RPG');
        $genreRpg->setDescription('Jeux de rôle, MMORPG, ...');
        $manager->persist($genreRpg);

        // Genre STRATEGIE : RTS, tour par tour
        $genreStrategie = new Genre();
        $this->initDates($genreStrategie);
        $genreStrategie->setNom('Stratégie');
        $genreStrategie->setDescription('Jeux de stratégie (RTS, turn-based)');
        $manager->persist($genreStrategie);

        // Genre SIMULATION : simulation, gestion
        $genreSimulation = new Genre();
        $this->initDates($genreSimulation);
        $genreSimulation->setNom('Simulation');
        $genreSimulation->setDescription('Jeux de simulation, de gestion');
        $manager->persist($genreSimulation);

        // Genre SPORT
        $genreSport = new Genre();
        $this->initDates($genreSport);
        $genreSport->setNom('Sport');
        $genreSport->setDescription('Jeux de sport');
        $manager->persist($genreSport);

        // Genre COURSE
        $genreCourse = new Genre();
        $this->initDates($genreCourse);
        $genreCourse->setNom('Course');
        $genreCourse->setDescription('Jeux de course, par ex. automobile');
        $manager->persist($genreCourse);

        // Genre REFLEXION : puzzles, casse-tête
        $genreReflexion = new Genre();
        $this->initDates($genreReflexion);
        $genreReflexion->setNom('Réflexion');
        $genreReflexion->setDescription('Jeux de réflexion, puzzles, casse-tête');
        $manager->persist($genreReflexion);

        // =====================================================
        // Créer les éditeurs
        // =====================================================

        $editeurSony = new Editeur();
        $this->initDates($editeurSony);
        $editeurSony->setNom('Sony Interactive Entertainment');
        $editeurSony->setPays('Japon');
        $editeurSony->setSiteWeb('https://www.sie.com');
        $manager->persist($editeurSony);

        $editeurNintendo = new Editeur();
        $this->initDates($editeurNintendo);
        $editeurNintendo->setNom('Nintendo');
        $editeurNintendo->setPays('Japon');
        $editeurNintendo->setSiteWeb('https://www.nintendo.com');
        $manager->persist($editeurNintendo);

        $editeurUbisoft = new Editeur();
        $this->initDates($editeurUbisoft);
        $editeurUbisoft->setNom('Ubisoft');
        $editeurUbisoft->setPays('France');
        $editeurUbisoft->setSiteWeb('https://www.ubisoft.com');
        $manager->persist($editeurUbisoft);

        $editeurEa = new Editeur();
        $this->initDates($editeurEa);
        $editeurEa->setNom('Electronic Arts');
        $editeurEa->setPays('États-Unis');
        $editeurEa->setSiteWeb('https://www.ea.com');
        $manager->persist($editeurEa);

        $editeurXbox = new Editeur();
        $this->initDates($editeurXbox);
        $editeurXbox->setNom('Xbox Game Studios');
        $editeurXbox->setPays('États-Unis');
        $editeurXbox->setSiteWeb('https://www.xbox.com');
        $manager->persist($editeurXbox);

        $editeurSquareEnix = new Editeur();
        $this->initDates($editeurSquareEnix);
        $editeurSquareEnix->setNom('Square Enix');
        $editeurSquareEnix->setPays('Japon');
        $editeurSquareEnix->setSiteWeb('https://www.square-enix.com');
        $manager->persist($editeurSquareEnix);

        $editeurBandai = new Editeur();
        $this->initDates($editeurBandai);
        $editeurBandai->setNom('Bandai Namco Entertainment');
        $editeurBandai->setPays('Japon');
        $editeurBandai->setSiteWeb('https://www.bandainamcoent.com');
        $manager->persist($editeurBandai);

        $editeurRockstar = new Editeur();
        $this->initDates($editeurRockstar);
        $editeurRockstar->setNom('Rockstar Games');
        $editeurRockstar->setPays('États-Unis');
        $editeurRockstar->setSiteWeb('https://www.rockstargames.com');
        $manager->persist($editeurRockstar);

        $editeurCdProjekt = new Editeur();
        $this->initDates($editeurCdProjekt);
        $editeurCdProjekt->setNom('CD Projekt');
        $editeurCdProjekt->setPays('Pologne');
        $editeurCdProjekt->setSiteWeb('https://www.cdprojekt.com');
        $manager->persist($editeurCdProjekt);

        $editeurCapcom = new Editeur();
        $this->initDates($editeurCapcom);
        $editeurCapcom->setNom('Capcom');
        $editeurCapcom->setPays('Japon');
        $editeurCapcom->setSiteWeb('https://www.capcom.com');
        $manager->persist($editeurCapcom);

        $editeurSega = new Editeur();
        $this->initDates($editeurSega);
        $editeurSega->setNom('Sega');
        $editeurSega->setPays('Japon');
        $editeurSega->setSiteWeb('https://www.sega.com');
        $manager->persist($editeurSega);

        $editeur2k = new Editeur();
        $this->initDates($editeur2k);
        $editeur2k->setNom('2K');
        $editeur2k->setPays('États-Unis');
        $editeur2k->setSiteWeb('https://www.2k.com');
        $manager->persist($editeur2k);

        $editeurValve = new Editeur();
        $this->initDates($editeurValve);
        $editeurValve->setNom('Valve');
        $editeurValve->setPays('États-Unis');
        $editeurValve->setSiteWeb('https://www.valvesoftware.com');
        $manager->persist($editeurValve);

        $editeurFocus = new Editeur();
        $this->initDates($editeurFocus);
        $editeurFocus->setNom('Focus Entertainment');
        $editeurFocus->setPays('France');
        $editeurFocus->setSiteWeb('https://www.focus-entmt.com');
        $manager->persist($editeurFocus);

        // =====================================================
        // Créer les jeux vidéo (32 jeux)
        // =====================================================

        // --- Sony ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('The Last of Us Part II');
        $jeuVideo->setEditeur($editeurSony);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Naughty Dog');
        $jeuVideo->setDateSortie(new \DateTime('2020-06-19'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('God of War Ragnarök');
        $jeuVideo->setEditeur($editeurSony);
        $jeuVideo->setGenre($genreAction);
        $jeuVideo->setDeveloppeur('Santa Monica Studio');
        $jeuVideo->setDateSortie(new \DateTime('2022-11-09'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Horizon Forbidden West');
        $jeuVideo->setEditeur($editeurSony);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Guerrilla Games');
        $jeuVideo->setDateSortie(new \DateTime('2022-02-18'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Gran Turismo 7');
        $jeuVideo->setEditeur($editeurSony);
        $jeuVideo->setGenre($genreCourse);
        $jeuVideo->setDeveloppeur('Polyphony Digital');
        $jeuVideo->setDateSortie(new \DateTime('2022-03-04'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Ghost of Tsushima');
        $jeuVideo->setEditeur($editeurSony);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Sucker Punch Productions');
        $jeuVideo->setDateSortie(new \DateTime('2020-07-17'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        // --- Nintendo ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('The Legend of Zelda: Tears of the Kingdom');
        $jeuVideo->setEditeur($editeurNintendo);
        $jeuVideo->setGenre($genreAventure);
        $jeuVideo->setDeveloppeur('Nintendo EPD');
        $jeuVideo->setDateSortie(new \DateTime('2023-05-12'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Super Mario Bros. Wonder');
        $jeuVideo->setEditeur($editeurNintendo);
        $jeuVideo->setGenre($genreAction);
        $jeuVideo->setDeveloppeur('Nintendo EPD');
        $jeuVideo->setDateSortie(new \DateTime('2023-10-20'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Mario Kart 8 Deluxe');
        $jeuVideo->setEditeur($editeurNintendo);
        $jeuVideo->setGenre($genreCourse);
        $jeuVideo->setDeveloppeur('Nintendo EPD');
        $jeuVideo->setDateSortie(new \DateTime('2017-04-28'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Animal Crossing: New Horizons');
        $jeuVideo->setEditeur($editeurNintendo);
        $jeuVideo->setGenre($genreSimulation);
        $jeuVideo->setDeveloppeur('Nintendo EPD');
        $jeuVideo->setDateSortie(new \DateTime('2020-03-20'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Captain Toad: Treasure Tracker');
        $jeuVideo->setEditeur($editeurNintendo);
        $jeuVideo->setGenre($genreReflexion);
        $jeuVideo->setDeveloppeur('Nintendo EPD');
        $jeuVideo->setDateSortie(new \DateTime('2018-07-13'));
        $jeuVideo->setPrix(39.99);
        $manager->persist($jeuVideo);

        // --- Ubisoft ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Assassin\'s Creed Mirage');
        $jeuVideo->setEditeur($editeurUbisoft);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Ubisoft Bordeaux');
        $jeuVideo->setDateSortie(new \DateTime('2023-10-05'));
        $jeuVideo->setPrix(49.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Rayman Legends');
        $jeuVideo->setEditeur($editeurUbisoft);
        $jeuVideo->setGenre($genreAction);
        $jeuVideo->setDeveloppeur('Ubisoft Montpellier');
        $jeuVideo->setDateSortie(new \DateTime('2013-08-29'));
        $jeuVideo->setPrix(19.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Anno 1800');
        $jeuVideo->setEditeur($editeurUbisoft);
        $jeuVideo->setGenre($genreStrategie);
        $jeuVideo->setDeveloppeur('Ubisoft Mainz');
        $jeuVideo->setDateSortie(new \DateTime('2019-04-16'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        // --- Electronic Arts ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('EA Sports FC 24');
        $jeuVideo->setEditeur($editeurEa);
        $jeuVideo->setGenre($genreSport);
        $jeuVideo->setDeveloppeur('EA Vancouver');
        $jeuVideo->setDateSortie(new \DateTime('2023-09-29'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Les Sims 4');
        $jeuVideo->setEditeur($editeurEa);
        $jeuVideo->setGenre($genreSimulation);
        $jeuVideo->setDeveloppeur('Maxis');
        $jeuVideo->setDateSortie(new \DateTime('2014-09-02'));
        $jeuVideo->setPrix(0);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Need for Speed Unbound');
        $jeuVideo->setEditeur($editeurEa);
        $jeuVideo->setGenre($genreCourse);
        $jeuVideo->setDeveloppeur('Criterion Games');
        $jeuVideo->setDateSortie(new \DateTime('2022-12-02'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        // --- Xbox Game Studios ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Forza Horizon 5');
        $jeuVideo->setEditeur($editeurXbox);
        $jeuVideo->setGenre($genreCourse);
        $jeuVideo->setDeveloppeur('Playground Games');
        $jeuVideo->setDateSortie(new \DateTime('2021-11-09'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Age of Empires IV');
        $jeuVideo->setEditeur($editeurXbox);
        $jeuVideo->setGenre($genreStrategie);
        $jeuVideo->setDeveloppeur('Relic Entertainment');
        $jeuVideo->setDateSortie(new \DateTime('2021-10-28'));
        $jeuVideo->setPrix(39.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Microsoft Flight Simulator');
        $jeuVideo->setEditeur($editeurXbox);
        $jeuVideo->setGenre($genreSimulation);
        $jeuVideo->setDeveloppeur('Asobo Studio');
        $jeuVideo->setDateSortie(new \DateTime('2020-08-18'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        // --- Square Enix ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Final Fantasy XVI');
        $jeuVideo->setEditeur($editeurSquareEnix);
        $jeuVideo->setGenre($genreRpg);
        $jeuVideo->setDeveloppeur('Square Enix');
        $jeuVideo->setDateSortie(new \DateTime('2023-06-22'));
        $jeuVideo->setPrix(79.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Life is Strange');
        $jeuVideo->setEditeur($editeurSquareEnix);
        $jeuVideo->setGenre($genreAventure);
        $jeuVideo->setDeveloppeur('Dontnod Entertainment');
        $jeuVideo->setDateSortie(new \DateTime('2015-01-30'));
        $jeuVideo->setPrix(19.99);
        $manager->persist($jeuVideo);

        // --- Bandai Namco ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Elden Ring');
        $jeuVideo->setEditeur($editeurBandai);
        $jeuVideo->setGenre($genreRpg);
        $jeuVideo->setDeveloppeur('FromSoftware');
        $jeuVideo->setDateSortie(new \DateTime('2022-02-25'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Tekken 8');
        $jeuVideo->setEditeur($editeurBandai);
        $jeuVideo->setGenre($genreAction);
        $jeuVideo->setDeveloppeur('Bandai Namco Studios');
        $jeuVideo->setDateSortie(new \DateTime('2024-01-26'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        // --- Rockstar Games ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Grand Theft Auto V');
        $jeuVideo->setEditeur($editeurRockstar);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Rockstar North');
        $jeuVideo->setDateSortie(new \DateTime('2013-09-17'));
        $jeuVideo->setPrix(29.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Red Dead Redemption 2');
        $jeuVideo->setEditeur($editeurRockstar);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Rockstar Studios');
        $jeuVideo->setDateSortie(new \DateTime('2018-10-26'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        // --- CD Projekt ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('The Witcher 3: Wild Hunt');
        $jeuVideo->setEditeur($editeurCdProjekt);
        $jeuVideo->setGenre($genreRpg);
        $jeuVideo->setDeveloppeur('CD Projekt Red');
        $jeuVideo->setDateSortie(new \DateTime('2015-05-19'));
        $jeuVideo->setPrix(29.99);
        $manager->persist($jeuVideo);

        // --- Capcom ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Resident Evil 4');
        $jeuVideo->setEditeur($editeurCapcom);
        $jeuVideo->setGenre($genreActionAventure);
        $jeuVideo->setDeveloppeur('Capcom');
        $jeuVideo->setDateSortie(new \DateTime('2023-03-24'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Street Fighter 6');
        $jeuVideo->setEditeur($editeurCapcom);
        $jeuVideo->setGenre($genreAction);
        $jeuVideo->setDeveloppeur('Capcom');
        $jeuVideo->setDateSortie(new \DateTime('2023-06-02'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        // --- Sega ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Football Manager 2024');
        $jeuVideo->setEditeur($editeurSega);
        $jeuVideo->setGenre($genreSport);
        $jeuVideo->setDeveloppeur('Sports Interactive');
        $jeuVideo->setDateSortie(new \DateTime('2023-11-06'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Total War: Warhammer III');
        $jeuVideo->setEditeur($editeurSega);
        $jeuVideo->setGenre($genreStrategie);
        $jeuVideo->setDeveloppeur('Creative Assembly');
        $jeuVideo->setDateSortie(new \DateTime('2022-02-17'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        // --- 2K ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('NBA 2K24');
        $jeuVideo->setEditeur($editeur2k);
        $jeuVideo->setGenre($genreSport);
        $jeuVideo->setDeveloppeur('Visual Concepts');
        $jeuVideo->setDateSortie(new \DateTime('2023-09-08'));
        $jeuVideo->setPrix(69.99);
        $manager->persist($jeuVideo);

        // --- Valve ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('Portal 2');
        $jeuVideo->setEditeur($editeurValve);
        $jeuVideo->setGenre($genreReflexion);
        $jeuVideo->setDeveloppeur('Valve');
        $jeuVideo->setDateSortie(new \DateTime('2011-04-19'));
        $jeuVideo->setPrix(9.99);
        $manager->persist($jeuVideo);

        // --- Focus Entertainment ---
        $jeuVideo = new JeuVideo();
        $this->initDates($jeuVideo);
        $jeuVideo->setTitre('A Plague Tale: Requiem');
        $jeuVideo->setEditeur($editeurFocus);
        $jeuVideo->setGenre($genreAventure);
        $jeuVideo->setDeveloppeur('Asobo Studio');
        $jeuVideo->setDateSortie(new \DateTime('2022-10-18'));
        $jeuVideo->setPrix(59.99);
        $manager->persist($jeuVideo);

        $manager->flush();
    }
    /**
     * Renseigne createdAt seulement si l'entité possède bien setCreatedAt()
     */
    private function initDates(object $entite): void
    {
        if (method_exists($entite, 'setCreatedAt')) {
            $entite->setCreatedAt(new \DateTimeImmutable());
        }
    }
}