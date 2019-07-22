<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190722032324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopping_card_item ADD shopping_card_id INT NOT NULL');
        $this->addSql('ALTER TABLE shopping_card_item ADD CONSTRAINT FK_E64C1F6F5446D752 FOREIGN KEY (shopping_card_id) REFERENCES shopping_card (id)');
        $this->addSql('CREATE INDEX IDX_E64C1F6F5446D752 ON shopping_card_item (shopping_card_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopping_card_item DROP FOREIGN KEY FK_E64C1F6F5446D752');
        $this->addSql('DROP INDEX IDX_E64C1F6F5446D752 ON shopping_card_item');
        $this->addSql('ALTER TABLE shopping_card_item DROP shopping_card_id');
    }
}
