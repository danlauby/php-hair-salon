<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        /// Test: test_getStylistName
        // Description: check class Stylist is made and can call name by getStylistName()
        // Input: "Sandy Star"
        // Output: "Sandy Star"
        function test_getStylistName()
       {
           //Arrange
           $stylist_name = "Sandy Star";
           $test_stylist_name = new Stylist($stylist_name);
           //Act
           $result = $test_stylist_name->getStylistName();
           //Assert
           $this->assertEquals($stylist_name, $result);
       }

    }
 ?>
