# cs5339_fall19_assignment3
## Table of Contents
- [Assignment 3](#cs5339_fall19_assignment3)
  - [Table of Contents](#table-of-contents)
    - [Description](#description)
    - [Installation](#installation)
    - [Acknowledgments](#acknowledgments)

### Description
Repository for CS5339 Fall 2019 Assignment 3

Assignment Repo consists of a docker-compose configuration of the following services:
* PHP 7.2
* SQL 5.7
* PHP MyAdmin
* Redis

PHP Source files are located in `./www/`

SQL Database Source is located in `./SqlImports/`

### Installation

Clone this repository on your local computer and `docker-compose up -d`.

    ```
    git clone https://github.com/camaron182/cs5339_fall19_assignment3.git
    cd cs5339_fall19_assignment3/
    cp sample.env .env
    docker-compose up -d
    ```
You can access PHPMyAdmin via `http://localhost:8080` where you can import the following files from the management console:
* carparts.sql
* database_definition.sql