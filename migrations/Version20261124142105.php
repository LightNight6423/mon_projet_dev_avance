<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261124142105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collect (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(20) NOT NULL, date_modif_statut DATETIME NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, date_achat DATETIME NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, utilisateur_id INT NOT NULL, jeu_video_id INT NOT NULL, INDEX IDX_A40662F4FB88E14F (utilisateur_id), INDEX IDX_A40662F4695B6720 (jeu_video_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, pseudo VARCHAR(30) NOT NULL, mail VARCHAR(255) NOT NULL, date_naissance DATETIME DEFAULT NULL, image_profil VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B386CC499D (pseudo), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE collect ADD CONSTRAINT FK_A40662F4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE collect ADD CONSTRAINT FK_A40662F4695B6720 FOREIGN KEY (jeu_video_id) REFERENCES jeu_video (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collect DROP FOREIGN KEY FK_A40662F4FB88E14F');
        $this->addSql('ALTER TABLE collect DROP FOREIGN KEY FK_A40662F4695B6720');
        $this->addSql('DROP TABLE collect');
        $this->addSql('DROP TABLE utilisateur');
    }
}
