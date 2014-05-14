/*Databases gatakka*/
/ * 
- a way to keep data in a structured system
- relational databases - mysql, mssql, oracale db... 
- the SQL language communicates with the database
- phpmyadmin - root + password in linux
	- never delete the information_schema and phpmyadmin databases
	- permissions



/ * Create new database:
- Database > name > Collation(encoding) here use utf-8 (ci means case insensitive) > create 

- new table creation -
	- name + number of columns > Go
- each columns must have name, type
	- varchar - small text, must have lenght
	- text - for large texts only
	- datetime - 
	- int - 
	- tinyint - use also as a  bool with 0 and 1 values
	- decimal -
	- float -
	- double -

- add new row with insert - phpmyadmin will generate the SQL

INSERT INTO 'telerik', 'users' (
	'user_id',
	'user_name',
	'password',
	'date_registered'
)
VALUES(
	'1', 'petko', 'qwerty', '2013-10-30 07:12:28'
);

- normalization -
	- one table for one thing

- SQL -
	- SELECT
	- INSERT INTO
	- UPDATE
	- DELETE  

SELECT user_name, FROM users

SELECT user_name, user_id FROM users 

SELECT * FROM users WHERE user_name ="ivan"
SELECT * FROM users WHERE user_name="ivan" AND user_id="1"

UPDATE users SET user_name="georgi" WHERE user_id="1"

DELETE FROM users WHERE user_id="1"

- to delete a table -
Structure > check table name > select drop

- Unique column -
	- INT + A_I + Index: PRIMARY 

- Storage data engines -
	- InnoDB - does not have full text search
	- MyISAM - does not support Foreign Keys

- add new columns -
	- Add > at the end > count



/ * MySQL bash:
- open:
mysql -u root -p
> Enter password:

- commands:
	SHOW DATABASES; - 
	CREATE DATABASE db_name; -
	USE db_name; -
	DROP DATABASE db_name; - destroys the whole database

// CREATE DATABASE 'db_name' CHARACTER SET utf8 COLLATE utf8_general_ci;

- create new user with full rights for one database:

GRANT ALL PRIVILEGES ON db_name.*
TO 'username'@'localhost'
IDENTIFIED BY 'password';

	- check:

SHOW GRANTS FOR 'username'@'localhost';
	
	- login directly to this db:

mysql -u username -p db_name
>Enter password:

/// user: widget_cms; password: strauss;
/// user: gallery_adm; password: strauss;
- add table:
	- syntax:
CREATE TABLE table_name (
	column_name1 definition,
	column_name2 definition,
	column_name3 definition,
	options
);

- example:

CREATE TABLE subjects (
	id INT(11) NOT NULL AUTO_INCREMENT,
	menu_name VARCHAR(30) NOT NULL,
	position INT(3) NOT NULL,
	visible TINYINT(1) NOT NULL,
	PRIMARY KEY (id)
);

	- check:
SHOW TABLES;

SHOW COLUMNS FROM table_name;

DROP TABLE table;

- CRUD:

	- READ:
		- SELECT

SELECT * 
FROM table
WHERE column1 = 'some_text'	// optional
ORDER BY column1 ASC;		// optional ascending
	
	- CREATE:
		- INSERT

INSERT INTO table (column1,  column2, column3)
VALUES (val1, val2, val3);

	- UPDATE:
		- UPDATE

UPDATE table
SET column1 = 'some_text'
WHERE id = 1;				// be careful with that

	- DELETE:
		- DELETE

DELETE FROM table
WHERE id = 1;

- EXAMPLE:
	
	- subject table:

SELECT FROM subjets;

INSERT INTO subjects ( menu_name, position,visible)
VALUES ('About Widget Corp', 1, 1);						// always use ''

INSERT INTO subjects ( menu_name, position,visible)
VALUES ('Products', 2, 1);

INSERT INTO subjects ( menu_name, position,visible)
VALUES ('Services', 3, 1);	

INSERT INTO subjects ( menu_name, position,visible)
VALUES ('Misc', 4, 0);	

SELECT * FROM subjects WHERE visible = 1 ORDER BY menu_name ASC;
SELECT * FROM subjects WHERE visible = 1 ORDER BY position DESC;

SELECT * FROM subjects WHERE id = 2;

SELECT menu_name, position FROM subjects WHERE visible = 1;

UPDATE subjects SET visible = 1 WHERE id = 4;
UPDATE subjects SET visible = 0;
UPDATE subjects SET visible = 1 WHERE id < 4;

DELETE FROM subjects WHERE id = 4;

- Relational Databases:

	- relations:
		- One-to-Many

Subjects - page
		 - page
		 - page

	- foreign key - a table column whose values reference rows in another table

table: subjects 						// one
-----------------------------------
id 		  |	1 							// primary key
-----------------------------------
menu_name | "About Widget Corp"
-----------------------------------
position  | 2
-----------------------------------
visible   | 1
-----------------------------------

table: pages							// many
-----------------------------------
id        | 12 							// primary key
-----------------------------------
subjet_id | 1   						// the foreign key
-----------------------------------
menu_name | "Our Mission"
-----------------------------------
position  | 2
-----------------------------------
visible   | 1
-----------------------------------
content   | "This is the page text"
-----------------------------------

- EXAMPLE:
	
	- pages table:

CREATE TABLE pages (
	id INT(11) NOT NULL AUTO_INCREMENT,
	subjet_id INT(11) NOT NULL,
	menu_name VARCHAR(30) NOT NULL,
	position INT(3) NOT NULL,
	visible TINYINT(1) NOT NULL,
	content TEXT,
	PRIMARY KEY (id),
	INDEX (subject_id)						// always create indexes for foreign keys 
);

INSERT INTO pages (subject_id, menu_name, position, visible, content)
VALUES (1, 'Our Mission', 1, 1, 'Our mission has always been...');

INSERT INTO pages (subject_id, menu_name, position, visible, content)
VALUES (1, 'Our History', 2, 1, 'Founded in 1898 by two enterprising engineers...');

INSERT INTO pages (subject_id, menu_name, position, visible, content)
VALUES (2, 'Large Widgets', 1, 1, 'Our large widgets have to be seen to be believed');

INSERT INTO pages (subject_id, menu_name, position, visible, content)
VALUES (2, 'Small Widgets', 2, 1, 'They say big things come in small packages...');

INSERT INTO pages (subject_id, menu_name, position, visible, content)
VALUES (3, 'Retrofitting', 1, 1, 'We love to replace widgets...');

INSERT INTO pages (subject_id, menu_name, position, visible, content)
VALUES (3, 'Certification', 2, 1, 'We can certify not only our widgets...');

	- admins table:

CREATE TABLE admins (
	id INT(11) NOT NULL AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	hashed_password VARCHAR(60) NOT NULL,
	PRIMARY KEY (id)
);



/ * 
- PHP - oop, MVC
- JavaScript - jQuery, AJAX, oop, JSON
- HTML and CSS - responsive design, SASS
- mysql -  