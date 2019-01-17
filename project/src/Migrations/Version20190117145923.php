<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117145923 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE token_email token_email VARCHAR(255) DEFAULT NULL, CHANGE token_password token_password VARCHAR(255) DEFAULT NULL, CHANGE date_last_cx date_last_cx DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE matchup CHANGE win_competitor_id win_competitor_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE competitor CHANGE url url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE event CHANGE date_start date_start DATETIME NOT NULL, CHANGE date_end date_end DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE video_game CHANGE editor editor VARCHAR(255) DEFAULT NULL, CHANGE website website VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competitor CHANGE url url VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE event CHANGE date_start date_start DATETIME NOT NULL, CHANGE date_end date_end DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE matchup CHANGE win_competitor_id win_competitor_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE token_email token_email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE token_password token_password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_last_cx date_last_cx DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE video_game CHANGE editor editor VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
