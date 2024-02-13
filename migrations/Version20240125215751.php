<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125215751 extends AbstractMigration
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
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_3');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_6');
        $this->addSql('DROP INDEX main_champion_id ON user');
        $this->addSql('DROP INDEX rank_id ON user');
        $this->addSql('DROP INDEX play_style_id ON user');
        $this->addSql('DROP INDEX main_role_id ON user');
        $this->addSql('DROP INDEX frequency_play_id ON user');
        $this->addSql('DROP INDEX language_id ON user');
        $this->addSql('ALTER TABLE user DROP main_champion_id, DROP rank_id, DROP play_style_id, DROP main_role_id, DROP frequency_play_id, DROP language_id, CHANGE username username VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frequency_play MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON frequency_play');
        $this->addSql('ALTER TABLE frequency_play CHANGE id id_frequency_play INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE frequency_play ADD PRIMARY KEY (id_frequency_play)');
        $this->addSql('ALTER TABLE languages MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON languages');
        $this->addSql('ALTER TABLE languages DROP img, CHANGE id id_languages INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE languages ADD PRIMARY KEY (id_languages)');
        $this->addSql('ALTER TABLE main_champions MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON main_champions');
        $this->addSql('ALTER TABLE main_champions CHANGE id id_main_champions INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_champions ADD PRIMARY KEY (id_main_champions)');
        $this->addSql('ALTER TABLE main_roles MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON main_roles');
        $this->addSql('ALTER TABLE main_roles CHANGE id id_main_roles INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_roles ADD PRIMARY KEY (id_main_roles)');
        $this->addSql('ALTER TABLE matches MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON matches');
        $this->addSql('ALTER TABLE matches CHANGE id id_matches INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE matches ADD PRIMARY KEY (id_matches)');
        $this->addSql('ALTER TABLE messages MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON messages');
        $this->addSql('ALTER TABLE messages CHANGE id id_messages INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD PRIMARY KEY (id_messages)');
        $this->addSql('ALTER TABLE play_styles MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON play_styles');
        $this->addSql('ALTER TABLE play_styles CHANGE id id_play_styles INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE play_styles ADD PRIMARY KEY (id_play_styles)');
        $this->addSql('ALTER TABLE ranks MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON ranks');
        $this->addSql('ALTER TABLE ranks DROP image, CHANGE id id_ranks INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ranks ADD PRIMARY KEY (id_ranks)');
        $this->addSql('ALTER TABLE user ADD main_champion_id INT DEFAULT NULL, ADD rank_id INT DEFAULT NULL, ADD play_style_id INT DEFAULT NULL, ADD main_role_id INT DEFAULT NULL, ADD frequency_play_id INT DEFAULT NULL, ADD language_id INT DEFAULT NULL, CHANGE username username VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_1 FOREIGN KEY (main_champion_id) REFERENCES main_champions (id_main_champions) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_2 FOREIGN KEY (rank_id) REFERENCES ranks (id_ranks) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_3 FOREIGN KEY (play_style_id) REFERENCES play_styles (id_play_styles) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_4 FOREIGN KEY (main_role_id) REFERENCES main_roles (id_main_roles) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_5 FOREIGN KEY (frequency_play_id) REFERENCES frequency_play (id_frequency_play) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_6 FOREIGN KEY (language_id) REFERENCES languages (id_languages) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX main_champion_id ON user (main_champion_id)');
        $this->addSql('CREATE INDEX rank_id ON user (rank_id)');
        $this->addSql('CREATE INDEX play_style_id ON user (play_style_id)');
        $this->addSql('CREATE INDEX main_role_id ON user (main_role_id)');
        $this->addSql('CREATE INDEX frequency_play_id ON user (frequency_play_id)');
        $this->addSql('CREATE INDEX language_id ON user (language_id)');
    }
}
