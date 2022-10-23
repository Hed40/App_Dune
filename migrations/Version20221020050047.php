<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020050047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE astreintes_matylde (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, duree_1 INT NOT NULL, duree_2 INT NOT NULL, motif_appel VARCHAR(255) DEFAULT NULL, intervention TINYINT(1) DEFAULT NULL, motif_intervention VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE astreintes CHANGE motif_intervention motif_intervention VARCHAR(1000) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE categorie categorie VARCHAR(255) NOT NULL, CHANGE grade grade VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE astreintes_matylde');
        $this->addSql('ALTER TABLE astreintes CHANGE motif_intervention motif_intervention LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` CHANGE categorie categorie VARCHAR(255) DEFAULT NULL, CHANGE grade grade VARCHAR(255) DEFAULT NULL');
    }
}
