<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240818135953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dealer ADD work_hour_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dealer ADD CONSTRAINT FK_17A339026058C3DB FOREIGN KEY (work_hour_id) REFERENCES dealer_work_hours (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17A339026058C3DB ON dealer (work_hour_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dealer DROP FOREIGN KEY FK_17A339026058C3DB');
        $this->addSql('DROP INDEX UNIQ_17A339026058C3DB ON dealer');
        $this->addSql('ALTER TABLE dealer DROP work_hour_id');
    }
}
