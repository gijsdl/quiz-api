<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200215164831 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE uitslag (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, question1 LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', question2 LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', question3 LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', question4 LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', question6 LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vraag CHANGE selected selected INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE uitslag');
        $this->addSql('ALTER TABLE vraag CHANGE selected selected INT DEFAULT NULL');
    }
}
