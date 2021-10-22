<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211022114937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subject_subject (subject_source INT NOT NULL, subject_target INT NOT NULL, INDEX IDX_5E4C92D8D793B654 (subject_source), INDEX IDX_5E4C92D8CE76E6DB (subject_target), PRIMARY KEY(subject_source, subject_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subject_subject ADD CONSTRAINT FK_5E4C92D8D793B654 FOREIGN KEY (subject_source) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subject_subject ADD CONSTRAINT FK_5E4C92D8CE76E6DB FOREIGN KEY (subject_target) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_subject DROP FOREIGN KEY FK_F30D3B96591CC992');
        $this->addSql('ALTER TABLE course_subject DROP FOREIGN KEY FK_F30D3B9623EDC87');
        $this->addSql('ALTER TABLE course_subject ADD CONSTRAINT FK_F30D3B9623EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE subject_subject');
        $this->addSql('ALTER TABLE course_subject DROP FOREIGN KEY FK_F30D3B9623EDC87');
        $this->addSql('ALTER TABLE course_subject DROP FOREIGN KEY FK_F30D3B96591CC992');
        $this->addSql('ALTER TABLE course_subject ADD CONSTRAINT FK_F30D3B96591CC992 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
    }
}
