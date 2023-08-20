<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230819131536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_allergene (user_id INT NOT NULL, allergene_id INT NOT NULL, INDEX IDX_93C3A701A76ED395 (user_id), INDEX IDX_93C3A7014646AB2 (allergene_id), PRIMARY KEY(user_id, allergene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_allergene ADD CONSTRAINT FK_93C3A701A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_allergene ADD CONSTRAINT FK_93C3A7014646AB2 FOREIGN KEY (allergene_id) REFERENCES allergene (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE allergene DROP FOREIGN KEY FK_93232AE5A76ED395');
        $this->addSql('DROP INDEX IDX_93232AE5A76ED395 ON allergene');
        $this->addSql('ALTER TABLE allergene DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_allergene DROP FOREIGN KEY FK_93C3A701A76ED395');
        $this->addSql('ALTER TABLE user_allergene DROP FOREIGN KEY FK_93C3A7014646AB2');
        $this->addSql('DROP TABLE user_allergene');
        $this->addSql('ALTER TABLE allergene ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE allergene ADD CONSTRAINT FK_93232AE5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_93232AE5A76ED395 ON allergene (user_id)');
    }
}
