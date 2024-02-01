<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201035124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exam_audiometry (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_CCCC47A23544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_blood_chemistry (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_43067D533544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_blood_type (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', blood_type VARCHAR(10) DEFAULT NULL, fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_6E4EA7A63544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_cbc (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_DA2BD3B33544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_chest_xray (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_EF535A7B3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_drugs (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_88C93F6A3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_ekg (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_809D0513544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_hbs_ag (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_CCFE96D13544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_hep_a (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_621AB2153544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_hiv (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_585701723544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_ova_and_parasites (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_FF9A35583544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_pregnancy_test (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_22EB926E3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_psa (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_799C8CA63544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_psychological (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_AC1C548D3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_riba (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_47EE99FC3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_rpr (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_D58B4AD53544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_stool_culture (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_602EF4083544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_urinalysis (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8943B4403544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_vaccines (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_E4ABDEB23544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_visual_acuity (id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', medical_history_id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', fasting INT DEFAULT 0, status VARCHAR(255) DEFAULT NULL, evaluator BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:ulid)\', deleted SMALLINT DEFAULT 0 NOT NULL, created_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', updated_by BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_1BD4812F3544AD9E (medical_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exam_audiometry ADD CONSTRAINT FK_CCCC47A23544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_blood_chemistry ADD CONSTRAINT FK_43067D533544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_blood_type ADD CONSTRAINT FK_6E4EA7A63544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_cbc ADD CONSTRAINT FK_DA2BD3B33544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_chest_xray ADD CONSTRAINT FK_EF535A7B3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_drugs ADD CONSTRAINT FK_88C93F6A3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_ekg ADD CONSTRAINT FK_809D0513544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_hbs_ag ADD CONSTRAINT FK_CCFE96D13544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_hep_a ADD CONSTRAINT FK_621AB2153544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_hiv ADD CONSTRAINT FK_585701723544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_ova_and_parasites ADD CONSTRAINT FK_FF9A35583544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_pregnancy_test ADD CONSTRAINT FK_22EB926E3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_psa ADD CONSTRAINT FK_799C8CA63544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_psychological ADD CONSTRAINT FK_AC1C548D3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_riba ADD CONSTRAINT FK_47EE99FC3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_rpr ADD CONSTRAINT FK_D58B4AD53544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_stool_culture ADD CONSTRAINT FK_602EF4083544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_urinalysis ADD CONSTRAINT FK_8943B4403544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_vaccines ADD CONSTRAINT FK_E4ABDEB23544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
        $this->addSql('ALTER TABLE exam_visual_acuity ADD CONSTRAINT FK_1BD4812F3544AD9E FOREIGN KEY (medical_history_id) REFERENCES medical_history (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exam_audiometry DROP FOREIGN KEY FK_CCCC47A23544AD9E');
        $this->addSql('ALTER TABLE exam_blood_chemistry DROP FOREIGN KEY FK_43067D533544AD9E');
        $this->addSql('ALTER TABLE exam_blood_type DROP FOREIGN KEY FK_6E4EA7A63544AD9E');
        $this->addSql('ALTER TABLE exam_cbc DROP FOREIGN KEY FK_DA2BD3B33544AD9E');
        $this->addSql('ALTER TABLE exam_chest_xray DROP FOREIGN KEY FK_EF535A7B3544AD9E');
        $this->addSql('ALTER TABLE exam_drugs DROP FOREIGN KEY FK_88C93F6A3544AD9E');
        $this->addSql('ALTER TABLE exam_ekg DROP FOREIGN KEY FK_809D0513544AD9E');
        $this->addSql('ALTER TABLE exam_hbs_ag DROP FOREIGN KEY FK_CCFE96D13544AD9E');
        $this->addSql('ALTER TABLE exam_hep_a DROP FOREIGN KEY FK_621AB2153544AD9E');
        $this->addSql('ALTER TABLE exam_hiv DROP FOREIGN KEY FK_585701723544AD9E');
        $this->addSql('ALTER TABLE exam_ova_and_parasites DROP FOREIGN KEY FK_FF9A35583544AD9E');
        $this->addSql('ALTER TABLE exam_pregnancy_test DROP FOREIGN KEY FK_22EB926E3544AD9E');
        $this->addSql('ALTER TABLE exam_psa DROP FOREIGN KEY FK_799C8CA63544AD9E');
        $this->addSql('ALTER TABLE exam_psychological DROP FOREIGN KEY FK_AC1C548D3544AD9E');
        $this->addSql('ALTER TABLE exam_riba DROP FOREIGN KEY FK_47EE99FC3544AD9E');
        $this->addSql('ALTER TABLE exam_rpr DROP FOREIGN KEY FK_D58B4AD53544AD9E');
        $this->addSql('ALTER TABLE exam_stool_culture DROP FOREIGN KEY FK_602EF4083544AD9E');
        $this->addSql('ALTER TABLE exam_urinalysis DROP FOREIGN KEY FK_8943B4403544AD9E');
        $this->addSql('ALTER TABLE exam_vaccines DROP FOREIGN KEY FK_E4ABDEB23544AD9E');
        $this->addSql('ALTER TABLE exam_visual_acuity DROP FOREIGN KEY FK_1BD4812F3544AD9E');
        $this->addSql('DROP TABLE exam_audiometry');
        $this->addSql('DROP TABLE exam_blood_chemistry');
        $this->addSql('DROP TABLE exam_blood_type');
        $this->addSql('DROP TABLE exam_cbc');
        $this->addSql('DROP TABLE exam_chest_xray');
        $this->addSql('DROP TABLE exam_drugs');
        $this->addSql('DROP TABLE exam_ekg');
        $this->addSql('DROP TABLE exam_hbs_ag');
        $this->addSql('DROP TABLE exam_hep_a');
        $this->addSql('DROP TABLE exam_hiv');
        $this->addSql('DROP TABLE exam_ova_and_parasites');
        $this->addSql('DROP TABLE exam_pregnancy_test');
        $this->addSql('DROP TABLE exam_psa');
        $this->addSql('DROP TABLE exam_psychological');
        $this->addSql('DROP TABLE exam_riba');
        $this->addSql('DROP TABLE exam_rpr');
        $this->addSql('DROP TABLE exam_stool_culture');
        $this->addSql('DROP TABLE exam_urinalysis');
        $this->addSql('DROP TABLE exam_vaccines');
        $this->addSql('DROP TABLE exam_visual_acuity');
    }
}
