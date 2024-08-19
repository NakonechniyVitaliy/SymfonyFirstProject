<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819175842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tags_to_posts (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_E9F717D34B89032C (post_id), INDEX IDX_E9F717D3BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tags_to_posts ADD CONSTRAINT FK_E9F717D34B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE tags_to_posts ADD CONSTRAINT FK_E9F717D3BAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tags_to_posts DROP FOREIGN KEY FK_E9F717D34B89032C');
        $this->addSql('ALTER TABLE tags_to_posts DROP FOREIGN KEY FK_E9F717D3BAD26311');
        $this->addSql('DROP TABLE tags_to_posts');
    }
}
