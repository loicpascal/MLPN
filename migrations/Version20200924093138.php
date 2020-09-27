<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200924093138 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, code VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_family (member_id INT NOT NULL, family_id INT NOT NULL, INDEX IDX_8130A3687597D3FE (member_id), INDEX IDX_8130A368C35E566A (family_id), PRIMARY KEY(member_id, family_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_family ADD CONSTRAINT FK_8130A3687597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_family ADD CONSTRAINT FK_8130A368C35E566A FOREIGN KEY (family_id) REFERENCES family (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE idea ADD family_id INT NOT NULL');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('CREATE INDEX IDX_A8BCA45C35E566A ON idea (family_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA45C35E566A');
        $this->addSql('ALTER TABLE member_family DROP FOREIGN KEY FK_8130A368C35E566A');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE member_family');
        $this->addSql('DROP INDEX IDX_A8BCA45C35E566A ON idea');
        $this->addSql('ALTER TABLE idea DROP family_id');
    }
}
