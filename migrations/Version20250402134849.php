<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250402134849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE veto (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE care_daily
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE animal ADD owner_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6AAB231F7E3C61F9 ON animal (owner_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD animal_id INT DEFAULT NULL, ADD weight_tracking INT NOT NULL, ADD food VARCHAR(255) NOT NULL, ADD behaviour VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care ADD CONSTRAINT FK_6113A8458E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6113A8458E962C16 ON care (animal_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE care_daily (id INT AUTO_INCREMENT NOT NULL, weight_tracking INT NOT NULL, food VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, behaviour VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE veto
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F7E3C61F9
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6AAB231F7E3C61F9 ON animal
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE animal DROP owner_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care DROP FOREIGN KEY FK_6113A8458E962C16
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6113A8458E962C16 ON care
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE care DROP animal_id, DROP weight_tracking, DROP food, DROP behaviour
        SQL);
    }
}
