<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117145336 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competitor_video_game (competitor_id INT NOT NULL, video_game_id INT NOT NULL, INDEX IDX_1976263C78A5D405 (competitor_id), INDEX IDX_1976263C16230A8 (video_game_id), PRIMARY KEY(competitor_id, video_game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competitor_video_game ADD CONSTRAINT FK_1976263C78A5D405 FOREIGN KEY (competitor_id) REFERENCES competitor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competitor_video_game ADD CONSTRAINT FK_1976263C16230A8 FOREIGN KEY (video_game_id) REFERENCES video_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE token_email token_email VARCHAR(255) DEFAULT NULL, CHANGE token_password token_password VARCHAR(255) DEFAULT NULL, CHANGE date_last_cx date_last_cx DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE matchup CHANGE win_competitor_id win_competitor_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE event CHANGE date_start date_start DATETIME NOT NULL, CHANGE date_end date_end DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE video_game CHANGE editor editor VARCHAR(255) DEFAULT NULL, CHANGE website website VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE competitor_video_game');
        $this->addSql('ALTER TABLE event CHANGE date_start date_start DATETIME NOT NULL, CHANGE date_end date_end DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE matchup CHANGE win_competitor_id win_competitor_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE token_email token_email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE token_password token_password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_last_cx date_last_cx DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE video_game CHANGE editor editor VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
