<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230805073627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE dragon_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dragon (id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE dragon_treasure ADD dragon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dragon_treasure ADD CONSTRAINT FK_9E31BF5F685856D6 FOREIGN KEY (dragon_id) REFERENCES dragon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9E31BF5F685856D6 ON dragon_treasure (dragon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dragon_treasure DROP CONSTRAINT FK_9E31BF5F685856D6');
        $this->addSql('DROP SEQUENCE dragon_id_seq CASCADE');
        $this->addSql('DROP TABLE dragon');
        $this->addSql('DROP INDEX IDX_9E31BF5F685856D6');
        $this->addSql('ALTER TABLE dragon_treasure DROP dragon_id');
    }
}
