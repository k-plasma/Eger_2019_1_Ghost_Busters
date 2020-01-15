CREATE DATABASE NotesApp;

USE NotesApp;

CREATE TABLE Users  (
  username varchar(50) PRIMARY KEY,
  password varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE user (
  neptun varchar(10) PRIMARY KEY,
  password varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Tasks (
  title varchar(100),
  username varchar(50) references Users.username,
  created TIMESTAMP,
  deadline date,
  notes varchar(400)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Tasks ADD PRIMARY KEY (title, username);




