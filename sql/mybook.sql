DROP DATABASE IF EXISTS mybook;
CREATE DATABASE mybook;
use mybook;

CREATE TABLE User (
    username VARCHAR(15),
    fname VARCHAR(15),
    lname VARCHAR(15),
    email VARCHAR(100),
    pwd VARCHAR(20),
    PRIMARY KEY(username,email)
);

CREATE TABLE Phone(
	username VARCHAR(11),
	telephone_no varchar(11),
    PRIMARY KEY(username),
	FOREIGN KEY(username)
	REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Address(
	username VARCHAR(11),
	street varchar(11),
	city varchar(11),
	country varchar(11),
    PRIMARY KEY(username),
	FOREIGN KEY(username)
	REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE User_Age (
	username VARCHAR(11),
	dob DATE,
	age INT,
	PRIMARY KEY(username),
	FOREIGN KEY(username)
	REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Profile(
	username VARCHAR(11),
	profile_id VARCHAR(11),
	gender VARCHAR(9),
	occupation VARCHAR(20),

	PRIMARY KEY(username,profile_id),
	FOREIGN KEY(username)
	REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Image(
	image_id VARCHAR(11),
	image_name VARCHAR(25),

	PRIMARY KEY(image_id)
);

CREATE TABLE Profile_Pic (
    profile_id INT AUTO_INCREMENT,
    image_id INT,

    PRIMARY KEY(profile_id,image_id)

	-- FOREIGN KEY(profile_id)
	-- REFERENCES Profile(profile_id) ON DELETE cascade ON UPDATE cascade,

	-- FOREIGN KEY(image_id)
	-- REFERENCES Image(image_id) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Post(
    post_id INT AUTO_INCREMENT,
    username VARCHAR(11),
    title VARCHAR(50),
	description varchar(350),
	PRIMARY KEY(post_id, username)
	-- FOREIGN KEY(username)
	-- REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Post_Date (
   post_id INT AUTO_INCREMENT,
   post_date DATE,
   post_time TIME,
   PRIMARY KEY(post_id)
);


CREATE TABLE Post_Image(
    post_id varchar(11),
    image_id VARCHAR(11),

	PRIMARY KEY(post_id,image_id),

	FOREIGN KEY(post_id)
	REFERENCES Post(post_id) ON DELETE cascade ON UPDATE cascade,

	FOREIGN KEY(image_id)
	REFERENCES Image(image_id) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Comment(
	comm_id INT AUTO_INCREMENT,
	post_id INT,
	user_comment VARCHAR(150),

	PRIMARY KEY(comm_id,post_id)

	-- FOREIGN KEY(post_id)
	-- REFERENCES Post(post_id) ON DELETE cascade ON DELETE cascade
);

CREATE TABLE Comment_Date (
   comm_id INT,
   comm_date DATE,
   comm_time TIME,
   PRIMARY KEY(comm_id)
);

CREATE TABLE Commenter(
	comm_id INT,
	username VARCHAR(11),

	PRIMARY KEY(comm_id,username)

	-- FOREIGN KEY(post_id)
	-- REFERENCES Post(post_id) ON DELETE cascade ON DELETE cascade
);

CREATE TABLE  Groups(
	group_id INT AUTO_INCREMENT,
	group_name VARCHAR(25),
	
	PRIMARY KEY(group_id)
);

CREATE TABLE  Group_Creator(
	group_id INT,
    username VARCHAR(11),
	date_created DATE,
	
	PRIMARY KEY(group_id,username)
	-- FOREIGN KEY(username)
	-- REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE  Group_Member(
	group_id VARCHAR(11),
	username VARCHAR(11),
	date_joined DATE,

	PRIMARY KEY(group_id,username)
	-- FOREIGN KEY(username)
	-- REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE  Group_Admin(
	group_id VARCHAR(11),
	username VARCHAR(11),

	PRIMARY KEY(group_id,username)
	-- FOREIGN KEY(username)
	-- REFERENCES User(username) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE Friends_With(
	username VARCHAR(11),
	email VARCHAR(100),
	friend_type VARCHAR(11),

	PRIMARY KEY(username,email)

	-- FOREIGN KEY(username)
	-- REFERENCES User(username) ON DELETE cascade ON UPDATE cascade	
);
-- foreign key(email)
	-- REFERENCES User(email) ON DELETE cascade ON UPDATE cascade,

SELECT User.username from User where Friends_With.email not in User;

SELECT User.username FROM User JOIN Friends_With ON User.username=Friends_With.username where Friends_With.email not in (SELECT email FROM Friends_With where username="pete123");

-- ALL USERS THAT ARE NOT FRIENDS WITH PETE123
SELECT username FROM User WHERE username != "pete123" AND username NOT IN (SELECT username FROM User WHERE email in (SELECT email FROM Friends_With WHERE username = "pete123"));

-- SELECT USERNAME OF FRIENDS OF PETE123

SELECT username FROM User WHERE email in (SELECT email FROM Friends_With WHERE username = "pete123");

-- UPDATE COLUMN
UPDATE User set fname = " " where username = "";

INSERT INTO Friends_With VALUES ('pete123','lgriffin@gmail.com','Work');
INSERT INTO Friends_With VALUES ('pete123','a@gmail.com','Work');
-- INSERT INTO Friends_With VALUES ('pete123','lgriffin@gmail.com','Work');

CREATE TABLE Post_Image (
    post_id INT,
    image_id INT,
	PRIMARY KEY(post_id,image_id)
);


CREATE TABLE Image (
   image_id INT AUTO_INCREMENT ,
   image_name VARCHAR(20),
   PRIMARY KEY(image_id)
);

-- FOR POST DATE
Delimiter $$
CREATE TRIGGER new_post
AFTER insert ON Post
FOR EACH ROW
BEGIN
insert into Post_Date(post_id,post_date,post_time) values
(new.post_id, now(),curtime());
END $$
delimiter ;

-- FOR COMMENT DATE
Delimiter $$
CREATE TRIGGER Comment
AFTER insert ON Post
FOR EACH ROW
BEGIN
insert into Comment_Date(comm_id,comm_date,comm_time) values
(new.comm_id, now(),curtime());
END $$
delimiter ;

-- FOR GROUP DATE
Delimiter $$
CREATE TRIGGER Comment
AFTER insert ON Groups
FOR EACH ROW
BEGIN
insert into Created_Date(comm_id,date_created) values
(new.comm_id, now());
END $$
delimiter ;

-- FOR PROFILE PIC
Delimiter $$
CREATE TRIGGER new_profile_pic
AFTER insert ON Image
FOR EACH ROW
BEGIN
insert into Profile_Pic(image_id) values
(new.image_id);
END $$
delimiter ;

-- FOR GROUP MEMBER
Delimiter $$
CREATE TRIGGER new_member
AFTER insert ON Groups
FOR EACH ROW
BEGIN
insert into Group_Member(group_id,username,date_joined) values
(new.group_id,new.username,now());
END $$
delimiter ;

-- FOR GROUP CREATOR
Delimiter $$
CREATE TRIGGER creator
AFTER insert ON Groups
FOR EACH ROW
BEGIN
insert into Group_Creator(group_id,username,date_created) values
(new.group_id,username,now());
END $$
delimiter ;

-- FOR GROUP CREATOR
Delimiter $$
CREATE TRIGGER admin
AFTER insert ON Groups
FOR EACH ROW
BEGIN
insert into Group_Admin(group_id,username) values
(new.group_id,username);
END $$
delimiter ;







-- POST_IMAGE
Delimiter $$
CREATE TRIGGER new_post_image
AFTER insert ON Post , Image
FOR EACH ROW
BEGIN
insert into Image_Post(post_id,image_id) values (new.post_id, new.image_id);
END $$
delimiter ;

-- POST IMAGE
Delimiter $$
CREATE TRIGGER new_client_time
AFTER insert ON customer
FOR EACH ROW
BEGIN
insert into new_client(customer_id, arrival_date,arrival_time) values
(new.customer_id, now(),curtime());
END $$
delimiter ;

CREATE TRIGGER salary_after_insert AFTER INSERT ON `SALARY` 
//     FOR EACH ROW
//     BEGIN
//          INSERT INTO join_table (emp_id, sal_id) VALUES (NEW.emp_id, LAST_INSERT_ID());
//    END;

Delimiter $$
CREATE TRIGGER image_post 
AFTER INSERT ON Post
FOR EACH ROW
begin
  INSERT INTO Post_Image (post_id,image_id) VALUES (NEW.post_id,LAST_INSERT_ID());
END $$
delimiter ;

Delimiter $$
CREATE TRIGGER image_post2 
AFTER INSERT ON Post,Image
FOR EACH ROW
begin
  INSERT INTO Post_Image (post_id,image_id) VALUES (NEW.post_id,NEW.image_id);
END $$
delimiter ;

SELECT image_name from Profile_Pic where profile_id in
(SELECT profile_id FROM Profile WHERE username = 'pete123');