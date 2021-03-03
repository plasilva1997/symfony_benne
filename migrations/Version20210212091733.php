<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212091733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76C98D9631');
        $this->addSql('ALTER TABLE bin DROP FOREIGN KEY FK_AA275AEDB6663089');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3B6663089');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE admin_has_ticket');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP INDEX IDX_AA275AEDB6663089 ON bin');
        $this->addSql('ALTER TABLE bin ADD id INT AUTO_INCREMENT NOT NULL, DROP id_admin_has_tickets_id, DROP id_bin, DROP `long`, DROP lat, DROP collect, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE postal_code postal_code VARCHAR(255) DEFAULT NULL, CHANGE street street VARCHAR(255) DEFAULT NULL, CHANGE bin_type bin_type VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id_admin INT AUTO_INCREMENT NOT NULL, id_admin_has_ticket_id INT NOT NULL, login VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role TINYINT(1) NOT NULL, token VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, modified_at DATETIME NOT NULL, INDEX IDX_880E0D76C98D9631 (id_admin_has_ticket_id), PRIMARY KEY(id_admin)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE admin_has_ticket (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ticket (id_ticket INT AUTO_INCREMENT NOT NULL, id_admin_has_tickets_id INT NOT NULL, id_bin INT NOT NULL, type VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, status TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME NOT NULL, INDEX IDX_97A0ADA3B6663089 (id_admin_has_tickets_id), PRIMARY KEY(id_ticket)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76C98D9631 FOREIGN KEY (id_admin_has_ticket_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B6663089 FOREIGN KEY (id_admin_has_tickets_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('ALTER TABLE bin MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE bin DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE bin ADD id_admin_has_tickets_id INT DEFAULT NULL, ADD id_bin INT NOT NULL, ADD `long` DOUBLE PRECISION DEFAULT NULL, ADD lat DOUBLE PRECISION DEFAULT NULL, ADD collect VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP id, CHANGE city city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code INT NOT NULL, CHANGE street street VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE bin_type bin_type VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE bin ADD CONSTRAINT FK_AA275AEDB6663089 FOREIGN KEY (id_admin_has_tickets_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('CREATE INDEX IDX_AA275AEDB6663089 ON bin (id_admin_has_tickets_id)');
    }
}
