<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407152513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE soccer_match (id INT AUTO_INCREMENT NOT NULL, home_team_id INT NOT NULL, away_team_id INT NOT NULL, start_date_time DATETIME NOT NULL, end_date_time DATETIME NOT NULL, play_stage VARCHAR(255) NOT NULL, winner LONGTEXT NOT NULL COMMENT \'(DC2Type:vo_winner)\', INDEX IDX_164E12609C4C13F6 (home_team_id), INDEX IDX_164E126045185D02 (away_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE soccer_match ADD CONSTRAINT FK_164E12609C4C13F6 FOREIGN KEY (home_team_id) REFERENCES soccer_team (id)');
        $this->addSql('ALTER TABLE soccer_match ADD CONSTRAINT FK_164E126045185D02 FOREIGN KEY (away_team_id) REFERENCES soccer_team (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soccer_match DROP FOREIGN KEY FK_164E12609C4C13F6');
        $this->addSql('ALTER TABLE soccer_match DROP FOREIGN KEY FK_164E126045185D02');
        $this->addSql('DROP TABLE soccer_match');
    }
}
