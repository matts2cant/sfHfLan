CREATE TABLE article_index (keyword VARCHAR(200), field VARCHAR(50), position BIGINT, id BIGINT, PRIMARY KEY(keyword, field, position, id)) ENGINE = INNODB;
CREATE TABLE article (id BIGINT AUTO_INCREMENT, image VARCHAR(255), url VARCHAR(255), title VARCHAR(255), content TEXT NOT NULL, is_shown TINYINT(1) DEFAULT '0' NOT NULL, type ENUM('blog', 'slider') DEFAULT 'blog', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX article_sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX category_sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE event (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, starts_at DATETIME, finishes_at DATETIME, entry_prize BIGINT, is_public TINYINT(1) DEFAULT '1' NOT NULL, is_opened TINYINT(1) DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX event_sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE game (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, rules VARCHAR(255), players_per_team BIGINT NOT NULL, requires_bnet_id TINYINT(1) NOT NULL, icon VARCHAR(255), slug VARCHAR(255), UNIQUE INDEX game_sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE partner (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, logo VARCHAR(255) NOT NULL, description text, sort_index BIGINT, url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX partner_sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE player (id BIGINT AUTO_INCREMENT, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, nickname VARCHAR(255), email VARCHAR(255) NOT NULL UNIQUE, team VARCHAR(255), team_tag VARCHAR(16), pc_type ENUM('none', 'laptop', 'desktop') NOT NULL, wants_cable TINYINT(1) NOT NULL, token VARCHAR(255) NOT NULL UNIQUE, bnet_email VARCHAR(255), bnet_ccode VARCHAR(255), tournament_id BIGINT NOT NULL, subtournament TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX tournament_id_idx (tournament_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tournament (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, number_of_teams BIGINT NOT NULL, prize_pool BIGINT NOT NULL, inscription_prize BIGINT, event_id BIGINT NOT NULL, game_id BIGINT, is_subtournament_enabled TINYINT(1) DEFAULT '0', subtournament_price BIGINT, subtournament_name VARCHAR(255), INDEX event_id_idx (event_id), INDEX game_id_idx (game_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE article_index ADD CONSTRAINT article_index_id_article_id FOREIGN KEY (id) REFERENCES article(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE player ADD CONSTRAINT player_tournament_id_tournament_id FOREIGN KEY (tournament_id) REFERENCES tournament(id) ON DELETE CASCADE;
ALTER TABLE tournament ADD CONSTRAINT tournament_game_id_game_id FOREIGN KEY (game_id) REFERENCES game(id) ON DELETE CASCADE;
ALTER TABLE tournament ADD CONSTRAINT tournament_event_id_event_id FOREIGN KEY (event_id) REFERENCES event(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
