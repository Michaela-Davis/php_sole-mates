# _Sole Mates_

#### _This web page allows a user to find their sole-mate: a store that carries their favorite brand of shoes, 3 March 2017_

#### By _**Michaela Davis**_

## Description

_This web page allows a user to find their sole-mate: a store that carries their favorite brand of shoes. The user is able to view brands carried by a store, add brands to a store, add stores to a brand, and see which stores carry their favorite brand._

## Epicodus / Tyler - all MySQL commands for databases:
* CREATE DATABASE shoes;
* USE shoes;
* CREATE table brands (brand_name VARCHAR (100), brand_id serial PRIMARY KEY);
* CREATE table stores (store_name VARCHAR (100), store_phone VARCHAR (15), store_address VARCHAR (255), store_id serial PRIMARY KEY);
* CREATE table brands_stores (br_id INT, st_id INT, join_id serial PRIMARY KEY);
* USE shoes_test; (we were instructed in To do with MySQL 1 to copy databases in the phpMyAdmin screen)

## Setup/Installation Requirements

* Ensure [composer](https://getcomposer.org/) is installed on your computer.
* Ensure [MAMP](https://www.mamp.info/en/) is installed on your computer.

* In terminal run the following commands:

1. Fork and clone this repository from [gitHub](https://github.com/Michaela-Davis/php_sole-mates.git).
2. Click the Import tab in myPHPAdmin and choose your database file then click `Go`. Ensure MAMP is pointed is at the root directory.
3. Navigate to the root directory of the project in which ever CLI shell you are using and run the command: `composer install`.
4. To run tests enter `composer test` in terminal.
5. Create a local server in the /web directory within the project folder using the command: php -S localhost:8000 (assuming you are using a mac), or php -S localhost:8888 (if using windows).
6. Open the directory http://localhost:8000/ (if on a mac) or http://localhost:8888/ (if on windows pc) in any standard web browser.

## Specifications

|    *Behavior*   |    *Input*    |     *Output*    |
|-----------------|---------------|-----------------|
| A user clicks on a store | click on "REI" | REI store page appears with a list of the brands they carry. |
| A user clicks on a brand | click on "Five Fingers" | Five Fingers shoe page appears with a list of stores that carry their brand |
| A user enters a new brand | type in "Five Fingers" | Brand page reloads with "Five Fingers" listed as a brand |
| A user enters a new store | type in "REI, 503-221-1938, 1405 NW Johnson St. Portland, OR" | Store page reloads with "REI" listed as a store |

## Known Bugs

_None so far._

## Support and contact details

_Please contact michaela.delight@gmail.com with concerns or comments._

## Technologies Used

* _Composer_
* _CSS_
* _HTML_
* _MySQL_
* _PHP_
* _PHPUnit_
* _Silex_
* _Twig_

### License

*MIT license*

Copyright (c) 2017 **_Michaela Davis_**
