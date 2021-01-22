<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122151004 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD id_admin_has_ticket_id INT NOT NULL');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76C98D9631 FOREIGN KEY (id_admin_has_ticket_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('CREATE INDEX IDX_880E0D76C98D9631 ON admin (id_admin_has_ticket_id)');
        $this->addSql('ALTER TABLE bin ADD id_admin_has_tickets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bin ADD CONSTRAINT FK_AA275AEDB6663089 FOREIGN KEY (id_admin_has_tickets_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('CREATE INDEX IDX_AA275AEDB6663089 ON bin (id_admin_has_tickets_id)');
        $this->addSql('ALTER TABLE ticket ADD id_admin_has_tickets_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B6663089 FOREIGN KEY (id_admin_has_tickets_id) REFERENCES admin_has_ticket (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3B6663089 ON ticket (id_admin_has_tickets_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76C98D9631');
        $this->addSql('DROP INDEX IDX_880E0D76C98D9631 ON admin');
        $this->addSql('ALTER TABLE admin DROP id_admin_has_ticket_id');
        $this->addSql('ALTER TABLE bin DROP FOREIGN KEY FK_AA275AEDB6663089');
        $this->addSql('DROP INDEX IDX_AA275AEDB6663089 ON bin');
        $this->addSql('ALTER TABLE bin DROP id_admin_has_tickets_id');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3B6663089');
        $this->addSql('DROP INDEX IDX_97A0ADA3B6663089 ON ticket');
        $this->addSql('ALTER TABLE ticket DROP id_admin_has_tickets_id');
    }
}
