<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407210402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE soccer_venue (id INT AUTO_INCREMENT NOT NULL, venue_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE soccer_match ADD winner_soccer_team_id INT DEFAULT NULL, ADD venue_id INT NOT NULL, ADD status_match VARCHAR(255) DEFAULT NULL, DROP winner');
        $this->addSql('ALTER TABLE soccer_match ADD CONSTRAINT FK_164E12602BF76D32 FOREIGN KEY (winner_soccer_team_id) REFERENCES soccer_team (id)');
        $this->addSql('ALTER TABLE soccer_match ADD CONSTRAINT FK_164E126040A73EBA FOREIGN KEY (venue_id) REFERENCES soccer_venue (id)');
        $this->addSql('CREATE INDEX IDX_164E12602BF76D32 ON soccer_match (winner_soccer_team_id)');
        $this->addSql('CREATE INDEX IDX_164E126040A73EBA ON soccer_match (venue_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soccer_match DROP FOREIGN KEY FK_164E126040A73EBA');
        $this->addSql('DROP TABLE soccer_venue');
        $this->addSql('ALTER TABLE soccer_match DROP FOREIGN KEY FK_164E12602BF76D32');
        $this->addSql('DROP INDEX IDX_164E12602BF76D32 ON soccer_match');
        $this->addSql('DROP INDEX IDX_164E126040A73EBA ON soccer_match');
        $this->addSql('ALTER TABLE soccer_match ADD winner VARCHAR(255) NOT NULL, DROP winner_soccer_team_id, DROP venue_id, DROP status_match');
    }
}
