<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";


    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
          Client::deleteAll();
          Stylist::deleteAll();
        }

        function test_setClientName()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $test_Client = new Client($client_name, $stylist_id);;
            $new_client_name = "Bobby Showdown";
            //Act
            $test_Client->setClientName($new_client_name);
            $result = $test_Client->getclientName();
            //Assert
            $this->assertEquals($new_client_name, $result);
        }

        function test_getClientName()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $test_Client = new Client($client_name, $stylist_id);
            //Act
            $result = $test_Client->getClientName();
            //Assert
            $this->assertEquals($client_name, $result);
        }

        function test_setStylistId()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $stylist_name2 = "Bobby Showdown";
            $test_Stylist2 = new Stylist($stylist_name2);
            $test_Stylist2->save();
            $Stylist_id2 = $test_Stylist2->getId();
            $client_name = "Lilly Anne";
            $test_Client = new Client($client_name, $stylist_id);
            //Act
            $test_Client->setStylistId($Stylist_id2);
            $result = $test_Client->getStylistId();
            //Assert
            $this->assertEquals($Stylist_id2, $result);
        }

        function test_getId()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $id = 1;
            $client_name = "Lilly Anne";
            $test_Client = new Client($client_name, $stylist_id, $id);
            //Act
            $result = $test_Client->getId();
            //Assert
            $this->assertEquals($id, $result);
        }

        function test_save()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $test_Client = new Client($client_name, $stylist_id);
            $test_Client->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals($test_Client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $client_name2 = "Bobby Showdown.";
            $test_Client = new Client($client_name, $stylist_id);
            $test_Client->save();
            $test_Client2 = new Client($client_name2, $stylist_id);
            $test_Client2->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_Client, $test_Client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $client_name2 = "Bobby Showdown";
            $test_Client = new Client($client_name, $stylist_id);
            $test_Client->save();
            $test_Client2 = new Client($client_name2, $stylist_id);
            $test_Client2->save();
            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testUpdate()
        {
            //Arrange
            $client_name = "Lilly Anne";
            $id = null;
            $test_Client = new Client($client_name, $id);
            $test_Client->save();
            $new_client_name = "Bobby Showdown";
            //Act
            $test_Client->updateClient($new_client_name);
            //Assert
            $this->assertEquals($new_client_name, $test_Client->getClientName());
        }

        function testDeleteClient()
        {
            //Arrange
            $client_name = "Lilly Anne";
            $id = 1;
            $test_Client = new Client($client_name, $id);
            $test_Client->save();
            $client_name2 = "Bobby Showdown";
            $id2 = 2;
            $test_Client2 = new Client($client_name2, $id2);
            $test_Client2->save();


            //Act
            $test_Client2->deleteClient();

            //Assert
            $this->assertEquals([$test_Client], Client::getAll());
        }

        function test_find()
        {
            //Arrange
            $stylist_name = "Sandy Star";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Lilly Anne";
            $client_name2 = "Bobby Showdown";
            $test_Client = new Client($client_name, $stylist_id);
            $test_Client->save();
            $test_Stylist2 = new Stylist($client_name2);
            $test_Stylist2->save();
            //Act
            $result = Client::find($test_Client->getId());
            //Assert
            $this->assertEquals($test_Client, $result);
        }
    }
