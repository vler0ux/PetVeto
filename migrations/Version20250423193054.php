<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423193054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE animal ADD veto_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FBCFA19FE FOREIGN KEY (veto_id) REFERENCES veto (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6AAB231FBCFA19FE ON animal (veto_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FBCFA19FE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6AAB231FBCFA19FE ON animal
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE animal DROP veto_id
        SQL);
    }
}
