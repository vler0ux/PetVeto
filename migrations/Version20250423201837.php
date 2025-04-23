<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423201837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD veto_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD CONSTRAINT FK_6113A845BCFA19FE FOREIGN KEY (veto_id) REFERENCES veto (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6113A845BCFA19FE ON care (veto_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE care DROP FOREIGN KEY FK_6113A845BCFA19FE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6113A845BCFA19FE ON care
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care DROP veto_id
        SQL);
    }
}
