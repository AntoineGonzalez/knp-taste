<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220906161413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, applicant_id INT DEFAULT NULL, granted TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_A45BDDC197139001 (applicant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application_vote (application_id INT NOT NULL, vote_id INT NOT NULL, INDEX IDX_ADFCEDEC3E030ACD (application_id), INDEX IDX_ADFCEDEC72DCDAFC (vote_id), PRIMARY KEY(application_id, vote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, name VARCHAR(72) NOT NULL, video_url VARCHAR(72) NOT NULL, unpublished_at DATETIME DEFAULT NULL, INDEX IDX_169E6FB9F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, reporter_id INT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_C42F7784E1CFE6F5 (reporter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report_course (report_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_3F6DBA264BD2A4C0 (report_id), INDEX IDX_3F6DBA26591CC992 (course_id), PRIMARY KEY(report_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(72) NOT NULL, email VARCHAR(72) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, value INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote_application (vote_id INT NOT NULL, application_id INT NOT NULL, INDEX IDX_17D6EB9572DCDAFC (vote_id), INDEX IDX_17D6EB953E030ACD (application_id), PRIMARY KEY(vote_id, application_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC197139001 FOREIGN KEY (applicant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE application_vote ADD CONSTRAINT FK_ADFCEDEC3E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application_vote ADD CONSTRAINT FK_ADFCEDEC72DCDAFC FOREIGN KEY (vote_id) REFERENCES vote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784E1CFE6F5 FOREIGN KEY (reporter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report_course ADD CONSTRAINT FK_3F6DBA264BD2A4C0 FOREIGN KEY (report_id) REFERENCES report (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE report_course ADD CONSTRAINT FK_3F6DBA26591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vote_application ADD CONSTRAINT FK_17D6EB9572DCDAFC FOREIGN KEY (vote_id) REFERENCES vote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vote_application ADD CONSTRAINT FK_17D6EB953E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC197139001');
        $this->addSql('ALTER TABLE application_vote DROP FOREIGN KEY FK_ADFCEDEC3E030ACD');
        $this->addSql('ALTER TABLE application_vote DROP FOREIGN KEY FK_ADFCEDEC72DCDAFC');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9F675F31B');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784E1CFE6F5');
        $this->addSql('ALTER TABLE report_course DROP FOREIGN KEY FK_3F6DBA264BD2A4C0');
        $this->addSql('ALTER TABLE report_course DROP FOREIGN KEY FK_3F6DBA26591CC992');
        $this->addSql('ALTER TABLE vote_application DROP FOREIGN KEY FK_17D6EB9572DCDAFC');
        $this->addSql('ALTER TABLE vote_application DROP FOREIGN KEY FK_17D6EB953E030ACD');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE application_vote');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE report_course');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vote');
        $this->addSql('DROP TABLE vote_application');
    }
}
