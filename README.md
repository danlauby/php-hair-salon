# _Hair Salon_

#### Application allows hair salon to organize stylist and clients in lists.

#### By Dan Lauby

## Description

This program allows the hair salon to keep track of which hair stylists are working in the salon and list all clients that are making appointments with each stylist.

## _Application Specifications_

| Behavior | Input | Output |
|----------|-------|--------|
|Check if stylist name can be returned|"Sandy Star"|"Sandy Star"|
|Check if stylist work id number can be returned|1|1|
|Check if each person can be saved for later use|"Sandy Star", 1|"Sandy Star", 1|
|Save all records|stylist: "Sandy Star" stylist2: "Hank the Tank"|stylist: "Sandy Star" stylist2: "Hank the Tank"|
|Delete all records|stylist: "Sandy Star" stylist2: "Hank the Tank"|" "|




## Setup/Installation Requirements

* Clone [php-hair-salon](https://github.com/danlauby/php-hair-salon) repository
* Download [Composer](https://getcomposer.org/)
* Run "composer install" in computer terminal
* Navigate into this project's "web" folder
* Run "php -S localhost:8000" in terminal to setup document root
* Open up web browser and navigate to the url "localhost:8000" to view functional program

## Known Bugs

None known.

## Support and contact details

Feel free to contact [Dan Lauby] (dmlauby@gmail.com) if any questions come up!

## Technologies Used

* PHP/Composer (dependencies)
* PHP/Silex (routing)
* PHPUnit (testing)
* MYSQL database
* HTML/Twig (templates)
* CSS/Bootstrap (interface)

### License

Copyright (c) 2017 Dan Lauby
