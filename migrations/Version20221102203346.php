<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102203346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE astreintes_andrew ADD user VARCHAR(255) NOT NULL, DROP id, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `astreintes_andrew` ADD id INT AUTO_INCREMENT NOT NULL, DROP user, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
