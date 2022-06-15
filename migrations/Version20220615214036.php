<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615214036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leads DROP CONSTRAINT fk_17904552953c1c61');
        $this->addSql('DROP INDEX uniq_17904552953c1c61');
        $this->addSql('ALTER TABLE leads ADD source VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE leads DROP source_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE leads ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE leads DROP source');
        $this->addSql('ALTER TABLE leads ADD CONSTRAINT fk_17904552953c1c61 FOREIGN KEY (source_id) REFERENCES source (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_17904552953c1c61 ON leads (source_id)');
    }
}
