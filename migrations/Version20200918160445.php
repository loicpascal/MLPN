<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200918160445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE idea (
            id INT AUTO_INCREMENT NOT NULL,
            member_id INT NOT NULL,
            member_taking_id INT DEFAULT NULL,
            member_adding_id INT NOT NULL,
            title VARCHAR(255) NOT NULL,
            description LONGTEXT DEFAULT NULL,
            link VARCHAR(255) DEFAULT NULL,
            state INT NOT NULL,
            archived TINYINT(1) DEFAULT \'0\' NOT NULL,
            INDEX IDX_A8BCA457597D3FE (member_id),
            INDEX IDX_A8BCA45A896ACAE (member_taking_id),
            INDEX IDX_A8BCA45F069D51D (member_adding_id),
            PRIMARY KEY(id))
            DEFAULT CHARACTER SET utf8mb4
            COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA457597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45A896ACAE FOREIGN KEY (member_taking_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45F069D51D FOREIGN KEY (member_adding_id) REFERENCES member (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE idea');
        $this->addSql('DROP INDEX UNIQ_70E4FA78A188FE64 ON member');
    }
}
