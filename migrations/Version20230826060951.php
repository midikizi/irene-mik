<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230826060951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apii (id INT AUTO_INCREMENT NOT NULL, montant INT NOT NULL, telephone INT NOT NULL, operateur VARCHAR(12) NOT NULL, code_secret VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptes (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, numero_compte VARCHAR(25) NOT NULL, solde INT NOT NULL, type VARCHAR(255) NOT NULL, date_ouvert DATETIME NOT NULL, INDEX IDX_56735801AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, compte_id INT NOT NULL, montant INT NOT NULL, date_depot DATETIME NOT NULL, INDEX IDX_47948BBC19EB6921 (client_id), INDEX IDX_47948BBCF2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pret (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, somme INT NOT NULL, INDEX IDX_52ECE97919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retrait (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, compte_id INT NOT NULL, montant INT NOT NULL, date_retrait DATETIME NOT NULL, INDEX IDX_7BB2A0319EB6921 (client_id), INDEX IDX_7BB2A03F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tontine (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, compte_id INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, montant INT NOT NULL, INDEX IDX_DB8BB5ED19EB6921 (client_id), INDEX IDX_DB8BB5EDF2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user2 (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1558D4EFE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comptes ADD CONSTRAINT FK_56735801AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBCF2C56620 FOREIGN KEY (compte_id) REFERENCES comptes (id)');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE97919EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE retrait ADD CONSTRAINT FK_7BB2A0319EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE retrait ADD CONSTRAINT FK_7BB2A03F2C56620 FOREIGN KEY (compte_id) REFERENCES comptes (id)');
        $this->addSql('ALTER TABLE tontine ADD CONSTRAINT FK_DB8BB5ED19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE tontine ADD CONSTRAINT FK_DB8BB5EDF2C56620 FOREIGN KEY (compte_id) REFERENCES comptes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes DROP FOREIGN KEY FK_56735801AB014612');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC19EB6921');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBCF2C56620');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE97919EB6921');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE retrait DROP FOREIGN KEY FK_7BB2A0319EB6921');
        $this->addSql('ALTER TABLE retrait DROP FOREIGN KEY FK_7BB2A03F2C56620');
        $this->addSql('ALTER TABLE tontine DROP FOREIGN KEY FK_DB8BB5ED19EB6921');
        $this->addSql('ALTER TABLE tontine DROP FOREIGN KEY FK_DB8BB5EDF2C56620');
        $this->addSql('DROP TABLE apii');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE comptes');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE pret');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE retrait');
        $this->addSql('DROP TABLE tontine');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user2');
    }
}
