CREATE DATABASE IF NOT EXISTS scoreTrack;
use scoreTrack;

CREATE TABLE IF NOT EXISTS team (
	team_id INT NOT NULL AUTO_INCREMENT,
	teamname VARCHAR(255) NOT NULL,
	nickname VARCHAR(4) NOT NULL,
	sport ENUM('RACQUETBALL', 'PINGPONG'),
	PRIMARY KEY (team_id)
);

CREATE TABLE IF NOT EXISTS user (
	user_id INT NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	username varchar(255) NOT NULL,
	team_id INT NOT NULL,
	profile_pic VARCHAR(255) DEFAULT NULL,
	create_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (team_id) REFERENCES team(team_id),
	PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS security (
	user_id INT NOT NULL,
	password text NOT NULL,
	salt varchar(32) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE IF NOT EXISTS game (
	game_id INT NOT NULL AUTO_INCREMENT,
	winner1 INT NOT NULL,
	winner2 INT DEFAULT NULL,
	loser1 INT NOT NULL,
	loser2 INT DEFAULT NULL,
	type ENUM('2','3','4') NOT NULL,
	game_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (game_id)
);