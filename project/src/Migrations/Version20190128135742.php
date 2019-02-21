<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190128135742 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ban (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, reason VARCHAR(255) NOT NULL, date DATETIME NOT NULL, date_lift DATETIME NOT NULL, INDEX IDX_62FED0E5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ban ADD CONSTRAINT FK_62FED0E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
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

        $this->addSql('DROP TABLE ban');
        $this->addSql('ALTER TABLE competitor CHANGE url url VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE event CHANGE date_start date_start DATETIME NOT NULL, CHANGE date_end date_end DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE matchup CHANGE win_competitor_id win_competitor_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE token_email token_email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE token_password token_password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_last_cx date_last_cx DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE video_game CHANGE editor editor VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
