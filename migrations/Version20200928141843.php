<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200928141843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, idea_id INT NOT NULL, member_id INT NOT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_9474526C5B6FEF7D (idea_id), INDEX IDX_9474526C7597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, name VARCHAR(60) NOT NULL, code VARCHAR(8) NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, hash VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_A5E6215BD1B862B8 (hash), INDEX IDX_A5E6215B7597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE idea (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, member_taking_id INT DEFAULT NULL, member_adding_id INT DEFAULT NULL, family_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, state INT NOT NULL, archived TINYINT(1) DEFAULT \'0\' NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_A8BCA457597D3FE (member_id), INDEX IDX_A8BCA45A896ACAE (member_taking_id), INDEX IDX_A8BCA45F069D51D (member_adding_id), INDEX IDX_A8BCA45C35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT \'0\' NOT NULL, firstname VARCHAR(60) DEFAULT NULL, lastname VARCHAR(60) DEFAULT NULL, birthdate DATE DEFAULT NULL, receive_email_new_comment TINYINT(1) DEFAULT \'0\' NOT NULL, password_forgotten_hash VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_70E4FA78E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_family (member_id INT NOT NULL, family_id INT NOT NULL, INDEX IDX_8130A3687597D3FE (member_id), INDEX IDX_8130A368C35E566A (family_id), PRIMARY KEY(member_id, family_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5B6FEF7D FOREIGN KEY (idea_id) REFERENCES idea (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B7597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA457597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45A896ACAE FOREIGN KEY (member_taking_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45F069D51D FOREIGN KEY (member_adding_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE member_family ADD CONSTRAINT FK_8130A3687597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_family ADD CONSTRAINT FK_8130A368C35E566A FOREIGN KEY (family_id) REFERENCES family (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA45C35E566A');
        $this->addSql('ALTER TABLE member_family DROP FOREIGN KEY FK_8130A368C35E566A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5B6FEF7D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7597D3FE');
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215B7597D3FE');
        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA457597D3FE');
        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA45A896ACAE');
        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA45F069D51D');
        $this->addSql('ALTER TABLE member_family DROP FOREIGN KEY FK_8130A3687597D3FE');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE idea');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE member_family');
    }
}
