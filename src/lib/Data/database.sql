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

/*Inserting some junk vulues for the testing purposes*/
INSERT INTO Users VALUES ("Tania", "123456"),
                         ("John", "nhoJ"),
                         ("Anna", "Anna00"),
                         ("MyDog", "hatescats"),
                         ("Lover", "7777777");

INSERT INTO Tasks(title, username, deadline, created, notes) 
VALUES ("Finish my project", "Tania", "2019-12-7", now(), Null);



