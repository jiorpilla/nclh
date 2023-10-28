<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231028130343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crew (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', id_number VARCHAR(50) DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, ship VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, passport_number VARCHAR(255) DEFAULT NULL, seaman_book_number VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, address_text VARCHAR(255) DEFAULT NULL, address_street VARCHAR(150) DEFAULT NULL, address_barangay VARCHAR(100) DEFAULT NULL, address_city VARCHAR(50) NOT NULL, address_province VARCHAR(50) DEFAULT NULL, address_region VARCHAR(50) DEFAULT NULL, address_postalcode INT DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nurses (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', department VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, address_text VARCHAR(255) DEFAULT NULL, address_street VARCHAR(150) DEFAULT NULL, address_barangay VARCHAR(100) DEFAULT NULL, address_city VARCHAR(50) NOT NULL, address_province VARCHAR(50) DEFAULT NULL, address_region VARCHAR(50) DEFAULT NULL, address_postalcode INT DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE physicians (id INT AUTO_INCREMENT NOT NULL, specialty VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, physician_license_number VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE crew');
        $this->addSql('DROP TABLE nurses');
        $this->addSql('DROP TABLE physicians');
    }
}
