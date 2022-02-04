CREATE DATABASE IF NOT EXISTS scoreTrack;
use scoreTrack;

CREATE TABLE IF NOT EXISTS user (
	user_id INT NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	username varchar(255) NOT NULL,
	team_id INT NOT NULL,
	profile_pic VARCHAR(255) DEFAULT NULL,
	create_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (team_id) REFERENCES team(team_id)
	PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS security (
	user_id INT NOT NULL,
	password text NOT NULL,
	salt varchar(32) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE IF NOT EXISTS team (
	team_id INT NOT NULL AUTO_INCREMENT,
	teamname VARCHAR(255) NOT NULL,
	nickname VARCHAR(4) NOT NULL,
	sport ENUM('RACQUETBALL', 'PINGPONG'),
	PRIMARY KEY (team_id)
);