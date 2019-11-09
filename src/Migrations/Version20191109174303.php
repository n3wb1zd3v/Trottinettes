<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191109174303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(50) NOT NULL, description_categorie LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_parcours (id INT AUTO_INCREMENT NOT NULL, parcours_id_id INT NOT NULL, nom_image VARCHAR(50) NOT NULL, url VARCHAR(55) NOT NULL, alt VARCHAR(100) DEFAULT NULL, INDEX IDX_3A92A389465705F (parcours_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiels (id INT AUTO_INCREMENT NOT NULL, nom_materiel VARCHAR(100) NOT NULL, url_image VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, nom_options VARCHAR(30) NOT NULL, type VARCHAR(30) NOT NULL, description_options LONGTEXT NOT NULL, prix NUMERIC(5, 2) NOT NULL, etat VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options_materiels (options_id INT NOT NULL, materiels_id INT NOT NULL, INDEX IDX_B06D1A543ADB05F1 (options_id), INDEX IDX_B06D1A54A10E8B56 (materiels_id), PRIMARY KEY(options_id, materiels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT NOT NULL, nom_parcours VARCHAR(20) NOT NULL, temps_parcours TIME NOT NULL, temps_global TIME NOT NULL, description_parcours LONGTEXT DEFAULT NULL, prix NUMERIC(5, 2) NOT NULL, INDEX IDX_99B1DEE38A3C7387 (categorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, materiel_id_id INT NOT NULL, nom_produit VARCHAR(30) NOT NULL, ref VARCHAR(13) NOT NULL, etat TINYINT(1) NOT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_BE2DDF8CADE93CE3 (materiel_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, parcours_id_id INT NOT NULL, user_id_id INT NOT NULL, nb_personnes INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, INDEX IDX_4DA239465705F (parcours_id_id), INDEX IDX_4DA2399D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations_options (reservations_id INT NOT NULL, options_id INT NOT NULL, INDEX IDX_5D0D8859D9A7F869 (reservations_id), INDEX IDX_5D0D88593ADB05F1 (options_id), PRIMARY KEY(reservations_id, options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, sexe VARCHAR(1) NOT NULL, adresse VARCHAR(150) NOT NULL, adresse2 VARCHAR(150) DEFAULT NULL, ville VARCHAR(50) NOT NULL, code_postal VARCHAR(10) NOT NULL, date_naissance DATE DEFAULT NULL, email VARCHAR(50) NOT NULL, telephone VARCHAR(20) NOT NULL, password VARCHAR(64) NOT NULL, token VARCHAR(32) NOT NULL, role INT NOT NULL, created_at DATETIME NOT NULL, valide TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventes (id INT AUTO_INCREMENT NOT NULL, reservation_id_id INT NOT NULL, prix_total NUMERIC(7, 2) NOT NULL, type_paiement VARCHAR(20) NOT NULL, date_paiement DATETIME NOT NULL, ref_paiement VARCHAR(100) NOT NULL, INDEX IDX_64EC489A3C3B4EF0 (reservation_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images_parcours ADD CONSTRAINT FK_3A92A389465705F FOREIGN KEY (parcours_id_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE options_materiels ADD CONSTRAINT FK_B06D1A543ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options_materiels ADD CONSTRAINT FK_B06D1A54A10E8B56 FOREIGN KEY (materiels_id) REFERENCES materiels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE38A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CADE93CE3 FOREIGN KEY (materiel_id_id) REFERENCES materiels (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239465705F FOREIGN KEY (parcours_id_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2399D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reservations_options ADD CONSTRAINT FK_5D0D8859D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations_options ADD CONSTRAINT FK_5D0D88593ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489A3C3B4EF0 FOREIGN KEY (reservation_id_id) REFERENCES reservations (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE38A3C7387');
        $this->addSql('ALTER TABLE options_materiels DROP FOREIGN KEY FK_B06D1A54A10E8B56');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CADE93CE3');
        $this->addSql('ALTER TABLE options_materiels DROP FOREIGN KEY FK_B06D1A543ADB05F1');
        $this->addSql('ALTER TABLE reservations_options DROP FOREIGN KEY FK_5D0D88593ADB05F1');
        $this->addSql('ALTER TABLE images_parcours DROP FOREIGN KEY FK_3A92A389465705F');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239465705F');
        $this->addSql('ALTER TABLE reservations_options DROP FOREIGN KEY FK_5D0D8859D9A7F869');
        $this->addSql('ALTER TABLE ventes DROP FOREIGN KEY FK_64EC489A3C3B4EF0');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2399D86650F');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE images_parcours');
        $this->addSql('DROP TABLE materiels');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE options_materiels');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE reservations_options');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE ventes');
    }
}
