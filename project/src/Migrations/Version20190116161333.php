<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116161333 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stream_platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stream (id INT AUTO_INCREMENT NOT NULL, platform_id INT NOT NULL, name VARCHAR(255) NOT NULL, seo VARCHAR(255) NOT NULL, INDEX IDX_F0E9BE1CFFE6496F (platform_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matchup (id INT AUTO_INCREMENT NOT NULL, win_competitor_id INT DEFAULT NULL, event_id INT NOT NULL, comp1_id INT NOT NULL, comp2_id INT NOT NULL, date DATETIME NOT NULL, is_bo TINYINT(1) NOT NULL, rounds INT NOT NULL, is_closed TINYINT(1) NOT NULL, is_finished TINYINT(1) NOT NULL, is_draw TINYINT(1) NOT NULL, score1 INT NOT NULL, score2 INT NOT NULL, winner INT NOT NULL, INDEX IDX_D5ED5651C0F070A6 (win_competitor_id), INDEX IDX_D5ED565171F7E88B (event_id), INDEX IDX_D5ED5651DA973B90 (comp1_id), INDEX IDX_D5ED5651C822947E (comp2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competitor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, acronym VARCHAR(15) NOT NULL, seo VARCHAR(255) NOT NULL, is_team TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, url VARCHAR(255) NOT NULL, pic VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, video_game_id INT NOT NULL, name VARCHAR(255) NOT NULL, seo VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME DEFAULT NULL, INDEX IDX_3BAE0AA716230A8 (video_game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_stream (event_id INT NOT NULL, stream_id INT NOT NULL, INDEX IDX_C270C94E71F7E88B (event_id), INDEX IDX_C270C94ED0ED463E (stream_id), PRIMARY KEY(event_id, stream_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, seo VARCHAR(255) NOT NULL, acronym VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bet (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, matchup_id INT NOT NULL, win_competitor_id INT NOT NULL, winner INT NOT NULL, score1 INT NOT NULL, score2 INT NOT NULL, is_draw TINYINT(1) NOT NULL, points INT NOT NULL, INDEX IDX_FBF0EC9BA76ED395 (user_id), INDEX IDX_FBF0EC9B3965E575 (matchup_id), INDEX IDX_FBF0EC9BC0F070A6 (win_competitor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, seo VARCHAR(255) NOT NULL, acronym VARCHAR(15) NOT NULL, description LONGTEXT DEFAULT NULL, editor VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, pic VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_game_genre (video_game_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_31C452C116230A8 (video_game_id), INDEX IDX_31C452C14296D31F (genre_id), PRIMARY KEY(video_game_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stream ADD CONSTRAINT FK_F0E9BE1CFFE6496F FOREIGN KEY (platform_id) REFERENCES stream_platform (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED5651C0F070A6 FOREIGN KEY (win_competitor_id) REFERENCES competitor (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED565171F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED5651DA973B90 FOREIGN KEY (comp1_id) REFERENCES competitor (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED5651C822947E FOREIGN KEY (comp2_id) REFERENCES competitor (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA716230A8 FOREIGN KEY (video_game_id) REFERENCES video_game (id)');
        $this->addSql('ALTER TABLE event_stream ADD CONSTRAINT FK_C270C94E71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_stream ADD CONSTRAINT FK_C270C94ED0ED463E FOREIGN KEY (stream_id) REFERENCES stream (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B3965E575 FOREIGN KEY (matchup_id) REFERENCES matchup (id)');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BC0F070A6 FOREIGN KEY (win_competitor_id) REFERENCES competitor (id)');
        $this->addSql('ALTER TABLE video_game_genre ADD CONSTRAINT FK_31C452C116230A8 FOREIGN KEY (video_game_id) REFERENCES video_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_game_genre ADD CONSTRAINT FK_31C452C14296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE token_email token_email VARCHAR(255) DEFAULT NULL, CHANGE token_password token_password VARCHAR(255) DEFAULT NULL, CHANGE date_last_cx date_last_cx DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stream DROP FOREIGN KEY FK_F0E9BE1CFFE6496F');
        $this->addSql('ALTER TABLE event_stream DROP FOREIGN KEY FK_C270C94ED0ED463E');
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9B3965E575');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED5651C0F070A6');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED5651DA973B90');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED5651C822947E');
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9BC0F070A6');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED565171F7E88B');
        $this->addSql('ALTER TABLE event_stream DROP FOREIGN KEY FK_C270C94E71F7E88B');
        $this->addSql('ALTER TABLE video_game_genre DROP FOREIGN KEY FK_31C452C14296D31F');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA716230A8');
        $this->addSql('ALTER TABLE video_game_genre DROP FOREIGN KEY FK_31C452C116230A8');
        $this->addSql('DROP TABLE stream_platform');
        $this->addSql('DROP TABLE stream');
        $this->addSql('DROP TABLE matchup');
        $this->addSql('DROP TABLE competitor');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_stream');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE bet');
        $this->addSql('DROP TABLE video_game');
        $this->addSql('DROP TABLE video_game_genre');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE token_email token_email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE token_password token_password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_last_cx date_last_cx DATETIME DEFAULT \'NULL\'');
    }
}
