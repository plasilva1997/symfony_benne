<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302145707 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bin DROP FOREIGN KEY FK_AA275AEDB6663089');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, mail VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, created_at_date DATETIME NOT NULL, modified_at_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE admin_has_ticket');
        $this->addSql('DROP INDEX IDX_AA275AEDB6663089 ON bin');
        $this->addSql('ALTER TABLE bin DROP id_admin_has_tickets_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin_has_ticket (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('ALTER TABLE bin ADD id_admin_has_tickets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bin ADD CONSTRAINT FK_AA275AEDB6663089 FOREIGN KEY (id_admin_has_tickets_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('CREATE INDEX IDX_AA275AEDB6663089 ON bin (id_admin_has_tickets_id)');
    }
}
