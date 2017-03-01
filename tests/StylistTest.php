<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
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

        function testGetClients()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $test_stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $test_Client = new Client($client_name, $test_stylist_id);
            $test_Client->save();
            $client_name2 = "Bobby Showdown";
            $test_Client2 = new Client($client_name2, $test_stylist_id);
            $test_Client2->save();
            //Act
            $result = $test_Stylist->getClients();
            //Assert
            $this->assertEquals([$test_Client, $test_Client2], $result);
        }

        function test_updateStylist()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $id = null;
            $test_Stylist = new Stylist($stylist_name, $id);
            $test_Stylist->save();
            $new_stylist_name = "Hank the Tank";
            //Act
            $test_Stylist->updateStylist($new_stylist_name);
            //Assert
            $this->assertEquals($new_stylist_name, $test_Stylist->getStylistName());
        }

        function testDeleteStylist()
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
            $test_Stylist->deleteStylist();
            //Assert
            $this->assertEquals([$test_Stylist2], Stylist::getAll());
        }

        function testDeleteStylistClients()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $id = null;
            $test_Stylist = new Stylist($stylist_name, $id);
            $test_Stylist->save();

            $client_name = "Lilly Anne";
            $stylist_id = $test_Stylist->getId();
            $test_Client = new Client($client_name, $id, $stylist_id);
            $test_Client->save();


            //Act
            $test_Stylist->deleteStylist();

            //Assert
            $this->assertEquals([], Stylist::getAll());
        }


    }
