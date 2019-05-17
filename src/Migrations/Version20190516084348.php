<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190516084348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE catalogue.revendeur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE catalogue.revendeur (id INT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(10) DEFAULT NULL, photo VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE catalogue.livres ALTER annee DROP DEFAULT');
        $this->addSql('ALTER TABLE catalogue.livres ALTER pages DROP DEFAULT');
        $this->addSql('ALTER TABLE catalogue.livres ALTER delai_de_livraison DROP DEFAULT');
        $this->addSql('ALTER TABLE catalogue.livres ALTER nouveaute DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE catalogue.revendeur_id_seq CASCADE');
        $this->addSql('DROP TABLE catalogue.revendeur');
        $this->addSql('ALTER TABLE Catalogue.Livres ALTER annee SET DEFAULT 0');
        $this->addSql('ALTER TABLE Catalogue.Livres ALTER pages SET DEFAULT 0');
        $this->addSql('ALTER TABLE Catalogue.Livres ALTER delai_de_livraison SET DEFAULT 0');
        $this->addSql('ALTER TABLE Catalogue.Livres ALTER nouveaute SET DEFAULT 0');
    }
}
