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

        function test_getStylistName()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            //Act
            $result = $test_Stylist->getStylistName();
            //Assert
            $this->assertEquals($stylist_name, $result);
        }

        function test_getId()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $stylist_id = 1;
            $test_Stylist = new Stylist($stylist_name, $stylist_id);
            //Act
            $result = $test_Stylist->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals($test_Stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $stylist_name2 = "Hank the Tank";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($stylist_name2);
            $test_Stylist2->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $stylist_name2 = "Hank the Tank";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($stylist_name2);
            $test_Stylist2->save();
            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals([], $result);
        }

    //    function test_getStylist()
    //    {
    //        // Arrange
    //        $stylist_name = "Sandy Star";
    //        $stylist_name2 = "Hank the Tank";
    //        $stylist_id = null;
    //        $test_stylist = new Stylist($stylist_name);
    //        $test_stylist->save();
    //        $test_stylist2= new Stylist($stylist_name2);
    //        $test_stylist2->save();
    //        // Act
    //        $result = Stylist::getStylist($stylist_id);
    //        // Assert
    //        $this->assertEquals($test_stylist, $result[0]);
    //    }

        function testUpdate()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $id = null;
            $test_Stylist = new Stylist($stylist_name, $id);
            $test_Stylist->save();
            $new_stylist_name = "Hank the Tank";
            //Act
            $test_Stylist->update($new_stylist_name);
            //Assert
            $this->assertEquals($new_stylist_name, $test_Stylist->getStylistName());
        }

        function testDelete()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $id = null;
            $test_Stylist = new Stylist($stylist_name, $id);
            $test_Stylist->save();
            $stylist_name2 = "Hank the Tank";
            $test_Stylist2 = new Stylist($stylist_name2);
            $test_Stylist2->save();
            //Act
            $test_Stylist->delete();
            //Assert
            $this->assertEquals([$test_Stylist2], Stylist::getAll());
        }

        static function find($id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
    }
