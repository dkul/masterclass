<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131121190512 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('ALTER TABLE album ADD COLUMN description VARCHAR(255) AFTER title;');
    }

    public function down(Schema $schema)
    {
        $this->addSql('ALTER TABLE album DROP COLUMN description;');
    }
}
