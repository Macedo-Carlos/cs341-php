CREATE TABLE users(
    id SERIAL NOT NULL PRIMARY KEY,
	userName VARCHAR(50) NOT NULL,
    userPassword VARCHAR(255) NOT NULL
);