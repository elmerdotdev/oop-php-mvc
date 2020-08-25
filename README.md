# Simple MVC framework using Object-Oriented Programming PHP

Demo: https://projects.elmer.dev/oop-mvc/

Uses [Bootstrap 4](https://getbootstrap.com/) for the CSS framework.

## Features
* Adding, listing, updating, deleting entries
* User registration
* User login/logout
* Password-hashing (bcrypt encryption)

## config.php

Modify the *config.php* file and add your database credentials.

### Database tables

Create two tables in phpmyadmin called *shares* and *users* with the fields listed below:

__shares___
* id (INT, PRIMARY, AUTO_INCREMENT)
* user_id (INT)
* title (VARCHAR (255))
* body (TEXT)
* link (VARCHAR (255))
* create_date (DATETIME, CURRENT_TIMESTAMP())

__users__
* id (INT, PRIMARY, AUTO_INCREMENT)
* name (VARCHAR (255))
* email (VARCHAR (255))
* password (VARCHAR (500))
* register_date (DATETIME, CURRENT_TIMESTAMP())
