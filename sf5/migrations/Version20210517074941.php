<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517074941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE emprunt');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, livre_id_id INT NOT NULL, abonne_id_id INT NOT NULL, date_emprunt DATE NOT NULL, date_retour DATE DEFAULT NULL, INDEX IDX_364071D7EC470631 (livre_id_id), INDEX IDX_364071D72C86CE99 (abonne_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D72C86CE99 FOREIGN KEY (abonne_id_id) REFERENCES abonne (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7EC470631 FOREIGN KEY (livre_id_id) REFERENCES livre (id)');
    }
}
