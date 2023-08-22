<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822104954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users ADD stack_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_USER_STACK FOREIGN KEY (stack_id) REFERENCES stacks (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_USER_STACK');
        $this->addSql('ALTER TABLE users DROP stack_id');
    }
}
