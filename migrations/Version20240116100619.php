<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116100619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frequency_play MODIFY id_frequency_play INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON frequency_play');
        $this->addSql('ALTER TABLE frequency_play CHANGE id_frequency_play id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE frequency_play ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE languages MODIFY id_languages INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON languages');
        $this->addSql('ALTER TABLE languages ADD img VARCHAR(255) NOT NULL, CHANGE id_languages id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE languages ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE main_champions MODIFY id_main_champions INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON main_champions');
        $this->addSql('ALTER TABLE main_champions CHANGE id_main_champions id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_champions ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE main_roles MODIFY id_main_roles INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON main_roles');
        $this->addSql('ALTER TABLE main_roles CHANGE id_main_roles id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_roles ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE matches MODIFY id_matches INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON matches');
        $this->addSql('ALTER TABLE matches CHANGE id_matches id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE matches ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE messages MODIFY id_messages INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON messages');
        $this->addSql('ALTER TABLE messages CHANGE id_messages id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE play_styles MODIFY id_play_styles INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON play_styles');
        $this->addSql('ALTER TABLE play_styles CHANGE id_play_styles id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE play_styles ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE ranks MODIFY id_ranks INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON ranks');
        $this->addSql('ALTER TABLE ranks ADD image VARCHAR(50) NOT NULL, CHANGE id_ranks id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ranks ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user MODIFY id_user INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON user');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(50) NOT NULL, CHANGE id_user id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON user');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(50) DEFAULT NULL, CHANGE id id_user INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id_user)');
        $this->addSql('ALTER TABLE frequency_play MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON frequency_play');
        $this->addSql('ALTER TABLE frequency_play CHANGE id id_frequency_play INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE frequency_play ADD PRIMARY KEY (id_frequency_play)');
        $this->addSql('ALTER TABLE play_styles MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON play_styles');
        $this->addSql('ALTER TABLE play_styles CHANGE id id_play_styles INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE play_styles ADD PRIMARY KEY (id_play_styles)');
        $this->addSql('ALTER TABLE languages MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON languages');
        $this->addSql('ALTER TABLE languages DROP img, CHANGE id id_languages INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE languages ADD PRIMARY KEY (id_languages)');
        $this->addSql('ALTER TABLE matches MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON matches');
        $this->addSql('ALTER TABLE matches CHANGE id id_matches INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE matches ADD PRIMARY KEY (id_matches)');
        $this->addSql('ALTER TABLE main_champions MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON main_champions');
        $this->addSql('ALTER TABLE main_champions CHANGE id id_main_champions INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_champions ADD PRIMARY KEY (id_main_champions)');
        $this->addSql('ALTER TABLE ranks MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON ranks');
        $this->addSql('ALTER TABLE ranks DROP image, CHANGE id id_ranks INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ranks ADD PRIMARY KEY (id_ranks)');
        $this->addSql('ALTER TABLE messages MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON messages');
        $this->addSql('ALTER TABLE messages CHANGE id id_messages INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD PRIMARY KEY (id_messages)');
        $this->addSql('ALTER TABLE main_roles MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON main_roles');
        $this->addSql('ALTER TABLE main_roles CHANGE id id_main_roles INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_roles ADD PRIMARY KEY (id_main_roles)');
    }
}
