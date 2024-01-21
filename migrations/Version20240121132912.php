<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240121132912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, barangay VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, province VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE announcement (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, post_start DATE DEFAULT NULL, post_end DATE DEFAULT NULL, target_roles JSON DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appointee (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', company VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appointment (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', crew_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', appointment_date DATE DEFAULT NULL, status INT DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_FE38F8445FE259F6 (crew_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE branch (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', name VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, upload_datetime DATETIME DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crew (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', id_number VARCHAR(50) DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, ship VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, passport_number VARCHAR(255) DEFAULT NULL, seaman_book_number VARCHAR(255) DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, picture VARCHAR(255) DEFAULT NULL, upload_datetime DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, recipient VARCHAR(255) NOT NULL, sender VARCHAR(255) NOT NULL, cc LONGTEXT DEFAULT NULL, bcc LONGTEXT DEFAULT NULL, subject VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_physical (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', temperature VARCHAR(20) DEFAULT NULL, spo2 VARCHAR(20) DEFAULT NULL, respiration VARCHAR(255) DEFAULT NULL, bp VARCHAR(50) DEFAULT NULL, height VARCHAR(10) DEFAULT NULL, weight VARCHAR(10) DEFAULT NULL, bmi VARCHAR(255) DEFAULT NULL, fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_944D7F3B3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lab_technician (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', department VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_history (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', crew_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', start_date DATE NOT NULL, end_date DATE DEFAULT NULL, status VARCHAR(255) NOT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_61B890855FE259F6 (crew_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nurses (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', department VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE physicians (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', specialty VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, physician_license_number VARCHAR(50) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, suffix VARCHAR(255) DEFAULT NULL, gender VARCHAR(50) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, location_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, civil_status SMALLINT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', name VARCHAR(255) NOT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_queue (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', room_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', crew_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', queue INT NOT NULL, status VARCHAR(255) DEFAULT NULL, deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_3541DEC854177093 (room_id), INDEX IDX_3541DEC85FE259F6 (crew_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, physician_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', lab_technician_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', nurse_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', crew_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8445FE259F6 FOREIGN KEY (crew_id) REFERENCES crew (id)');
        $this->addSql('ALTER TABLE exam_physical ADD CONSTRAINT FK_944D7F3B3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE medical_history ADD CONSTRAINT FK_61B890855FE259F6 FOREIGN KEY (crew_id) REFERENCES crew (id)');
        $this->addSql('ALTER TABLE room_queue ADD CONSTRAINT FK_3541DEC854177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room_queue ADD CONSTRAINT FK_3541DEC85FE259F6 FOREIGN KEY (crew_id) REFERENCES crew (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8445FE259F6');
        $this->addSql('ALTER TABLE exam_physical DROP FOREIGN KEY FK_944D7F3B3544AD9E');
        $this->addSql('ALTER TABLE medical_history DROP FOREIGN KEY FK_61B890855FE259F6');
        $this->addSql('ALTER TABLE room_queue DROP FOREIGN KEY FK_3541DEC854177093');
        $this->addSql('ALTER TABLE room_queue DROP FOREIGN KEY FK_3541DEC85FE259F6');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE announcement');
        $this->addSql('DROP TABLE appointee');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE branch');
        $this->addSql('DROP TABLE crew');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE exam_physical');
        $this->addSql('DROP TABLE lab_technician');
        $this->addSql('DROP TABLE medical_history');
        $this->addSql('DROP TABLE nurses');
        $this->addSql('DROP TABLE physicians');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_queue');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
