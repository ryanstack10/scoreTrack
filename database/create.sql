CREATE DATABASE IF NOT EXISTS scoreTrack;
use scoreTrack;

CREATE TABLE IF NOT EXISTS user (
	user_id INT NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	username varchar(255) NOT NULL,
	profile_pic INT DEFAULT 0,
	create_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS security (
	user_id INT NOT NULL,
	password text NOT NULL,
	salt varchar(32) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES user(user_id)
);

