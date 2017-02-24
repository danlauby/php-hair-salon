* hair_salon

** stylists
| Field        | Type                | Null | Key | Default | Extra          |
|--------------|---------------------|------|-----|---------|----------------|
| id           | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| stylist_name | varchar(255)        | YES  |     | NULL    |                |

** clients
| Field       | Type                | Null | Key | Default | Extra          |
|-------------|---------------------|------|-----|---------|----------------|
| id          | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| client_name | varchar(255)        | YES  |     | NULL    |                |
| stylist_id  | int(11)             | YES  |     | NULL    |                |


** mysql commands
|command      |Description|
|-------------|---------------------------------------------------|
|winpty c:/MAMP/bin/mysql/bin/mysql --host=localhost -uroot -proot
|Open mysql|
|SHOW DATABASES|Show list of all databases|
|CREATE DATABASE hair_salon|Create new database|
|USE hair_salon|Change into said database|
|CREATE TABLE stylists (id serial PRIMARY KEY, stylist_name VARCHAR(255))|Create a stylists table with two columns|
|CREATE TABLE clients (id serial PRIMARY KEY, stylist_name VARCHAR(255), stylists_id INT)|Create a clients table with three columns|
