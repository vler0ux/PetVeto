<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428094741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE care DROP FOREIGN KEY FK_6113A845317602E3
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6113A845317602E3 ON care
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD care_name VARCHAR(255) NOT NULL, DROP care_name_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD care_name_id INT DEFAULT NULL, DROP care_name
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD CONSTRAINT FK_6113A845317602E3 FOREIGN KEY (care_name_id) REFERENCES care_name (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6113A845317602E3 ON care (care_name_id)
        SQL);
    }
}
