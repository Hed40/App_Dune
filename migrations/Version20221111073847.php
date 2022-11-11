<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221111073847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE astreintes_users (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date DATE NOT NULL, heure DATETIME NOT NULL, duree_1 INT NOT NULL, duree_2 INT NOT NULL, motif_appel VARCHAR(255) NOT NULL, intervention SMALLINT DEFAULT NULL, motif_intervention VARCHAR(255) DEFAULT NULL, INDEX IDX_D6238B07A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE astreintes_users ADD CONSTRAINT FK_D6238B07A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE astreintes_users DROP FOREIGN KEY FK_D6238B07A76ED395');
        $this->addSql('DROP TABLE astreintes_users');
    }
}
