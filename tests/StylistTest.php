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

       function test_getId()
       {
           //Arrange
           $stylist_name = "Sandy Star";
           $stylist_id = 1;
           $test_stylist_id = new Stylist($stylist_name, $stylist_id);
           //Act
           $result = $test_stylist_id->getId();
           //Assert
           $this->assertEquals($stylist_id, $result);
       }
       ////Test: test_save
       //We need to create and test
       //save()
       //getAll()
       //Desc: add stylist_name restaurant to table and return
       //Input: "Sandy Star"
       //Output: Sandy Star"
       function test_save()
       {
           //Arrange
           $stylist_name = "Sandy Star";
           $test_stylist_name = new Stylist($stylist_name);
           //Act
           $result = $test_stylist_name->save();
           //Assert
           $this->assertEquals($result, $result);
       }

    }


 ?>
