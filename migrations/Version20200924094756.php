<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200924094756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE family ADD member_id INT NOT NULL');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B7597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('CREATE INDEX IDX_A5E6215B7597D3FE ON family (member_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215B7597D3FE');
        $this->addSql('DROP INDEX IDX_A5E6215B7597D3FE ON family');
        $this->addSql('ALTER TABLE family DROP member_id');
    }
}
