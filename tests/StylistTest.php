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
        protected function tearDown()
         {
           Stylist::deleteAll();
         }

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
           $this->assertEquals(true, is_numeric($result));
       }
       ////Test: test_save
       //We need to create and test
       //save()
       //getAll()
       //Description: add stylist_name restaurant to table and return
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
       ////Test: test_getAll
       //We need to create and test
       //save()
       //getAll()
       //Description: add stylist_two stylists to table and return
       //Input: "Sandy Star"
       //Input2: "Fank the Tank"
       //Output: Sandy Star"
       function test_getAll()
       {
           // Arrange
           $stylist_name = "Sandy Star";
           $stylist_name2 = "Hank the Tank";
           $test_stylist_name = new Stylist($stylist_name);
           $test_stylist_name->save();
           $test_stylist_name2= new Stylist($stylist_name2);
           $test_stylist_name2->save();
           //Act
           $result = Stylist::getAll();
           //Assert
           $this->assertEquals($test_stylist_name, $result[0]);
       }

       ///Test 2: test_deleteAll()    *don't forget tearDown!!
        //We need
        //deleteAll()
        //Description: delete all records from stylists_name
        //Input: "Sandy Star"
        //Input2: "Hank the Tank"
        //Output: " "
       function test_deleteAll()
       {
           // Arrange
           $stylist_name = "Sandy Star";
           $stylist_name2 = "Hank the Tank";
           $test_stylist = new Stylist($stylist_name);
           $test_stylist->save();
           $test_stylist2= new Stylist($stylist_name2);
           $test_stylist2->save();
           //Act
           Stylist::deleteAll();
           $result = Stylist::getAll();
           //Assert
           $this->assertEquals([], $result);
       }

       /// Test update
       // Description update individual records
       // Input: "Sandy Star"
       // Output: "Hank the Tank"
        function test_update()
        {
            // Arrange
            $stylist_name = "Sandy Star";
            $test_stylist = new Stylist($stylist_name);
            $new_stylist_name = "Hank the Tank";
            // Act
            $test_stylist->update($new_stylist_name);
            // Assert
            $this->assertEquals($new_stylist_name, $test_stylist->getStylistName());
        }

    }




 ?>
