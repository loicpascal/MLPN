<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200917150343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member (
            id INT AUTO_INCREMENT NOT NULL,
            email VARCHAR(180) NOT NULL,
            roles JSON NOT NULL,
            password VARCHAR(255) NOT NULL,
            is_active TINYINT(1) NOT NULL,
            firstname VARCHAR(60) DEFAULT NULL,
            lastname VARCHAR(60) DEFAULT NULL,
            birthdate DATE DEFAULT NULL,
            receive_email_new_comment TINYINT(1) NOT NULL,
            password_forgotten_hash VARCHAR(255) DEFAULT NULL,
            UNIQUE INDEX UNIQ_70E4FA78E7927C74 (email),
            PRIMARY KEY(id))
            DEFAULT CHARACTER SET utf8mb4
            COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE member');
    }
}
