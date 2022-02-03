use scoreTrack;

#User
INSERT INTO user (fname, lname, username) VALUES ('test_lname1', 'test_fname1', 'test_user1');
INSERT INTO user (fname, lname, username) VALUES ('test_lname2', 'test_fname2', 'test_user2');
INSERT INTO user (fname, lname, username) VALUES ('test_lname3', 'test_fname3', 'test_user3');

#Security
#password for test_user1 is password1
#password for test_user2 is password2
#password for test_user3 is password3
#generating salt with SUBSTRING(SHA2(RAND(), 512), -32) for 32 byte salt then appending to password

set @salt = SUBSTRING(SHA2(RAND(), 512), -32);
INSERT INTO security (user_id, password, salt) VALUES ((SELECT user_id FROM user WHERE username = 'test_user1'), SHA2(CONCAT('password1', @salt), 512),@salt);
set @salt = SUBSTRING(SHA2(RAND(), 512), -32);
INSERT INTO security (user_id, password, salt) VALUES ((SELECT user_id FROM user WHERE username = 'test_user2'), SHA2(CONCAT('password2', @salt), 512),@salt);
set @salt = SUBSTRING(SHA2(RAND(), 512), -32);
INSERT INTO security (user_id, password, salt) VALUES ((SELECT user_id FROM user WHERE username = 'test_user3'), SHA2(CONCAT('password3', @salt), 512),@salt); 

#teams
INSERT INTO teams (teamname, nickname, sport) VALUES ('Case Western Reserve University', 'CWRU','RACQUETBALL');
INSERT INTO teams (teamname, nickname, sport) VALUES ('Saline', 'SAL','PINGPONG');