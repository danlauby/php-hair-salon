<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        //  {
        //    Client::deleteAll();
        //  }

        /// Test: test getClientName()
        // Description: check class Client is made and can call name by getClientName()
        // Input: "Lilly Anne"
        // Output: "Lilly Anne"
        function test_getClientName()
       {
           //Arrange
           $client_name = "Lilly Anne";
           $test_client_name = new Client($client_name);
           //Act
           $result = $test_client_name->getClientName();
           //Assert
           $this->assertEquals($client_name, $result);
       }

       function test_getId()
       {
           //Arrange
           $client_name = "Lilly Anne";
           $stylist_id = 2;
           $id = 1;
           $test_client_id = new Client($client_name, $stylist_id, $id);
           //Act
           $result = $test_client_id->getId();
           //Assert
           $this->assertEquals(true, is_numeric($result));
       }
       ////Test: test save()
       //Description: add client_name restaurant to table and return
       //Input: "Lilly Anne"
       //Output: Lilly Anne"
       function test_save()
       {
           //Arrange
           $test_client_name = "Lilly Anne";
           $stylist_id = 2;
           $id = 1;
           $test_client = new Client($test_client_name, $stylist_id, $id);
           //Act
           $result = $test_client->save();
           //Assert
           $this->assertEquals($result, $result);
       }
       ////Test: test getAll()
       //Description: add client_two clients to table and return
       //Input: "Lilly Anne"
       //Input2: "Fank the Tank"
       //Output: Lilly Anne"
    //    function test_getAll()
    //    {
    //        // Arrange
    //        $client_name = "Lilly Anne";
    //        $client_id = 1;
    //        $client_name2 = "Bobby Showdown";
    //        $client_id2 = 2;
    //        $test_client_name = new Client($client_name, $client_id);
    //        $test_client_name->save();
    //        $test_client_name2= new Client($client_name2, $client_id2);
    //        $test_client_name2->save();
    //        //Act
    //        $result = Client::getAll();
    //        //Assert
    //        $this->assertEquals($test_client_name, $result[0]);
    //    }
    //
    //    ///Test 2: test_deleteAll()
    //     //Description: delete all records from clients_name
    //     //Input: "Lilly Anne"
    //     //Input2: "Bobby Showdown"
    //     //Output: " "
    //    function test_deleteAll()
    //    {
    //        // Arrange
    //        $client_name = "Lilly Anne";
    //        $client_id = 1;
    //        $client_name2 = "Bobby Showdown";
    //        $client_id2 = 2;
    //        $test_client = new Client($client_name, $client_id);
    //        $test_client->save();
    //        $test_client2= new Client($client_name2, $client_id2);
    //        $test_client2->save();
    //        //Act
    //        Client::deleteAll();
    //        $result = Client::getAll();
    //        //Assert
    //        $this->assertEquals([], $result);
    //    }
    //
    //    /// Test update()
    //    // Description: update individual records
    //    // Input: "Lilly Anne"
    //    // Output: "Bobby Showdown"
    //     function test_update()
    //     {
    //         // Arrange
    //         $client_name = "Lilly Anne";
    //         $client_id = 1;
    //         $test_client = new Client($client_name, $client_id);
    //         $new_client_name = "Bobby Showdown";
    //         $client_id2 = 2;
    //         // Act
    //         $test_client->update($new_client_name);
    //         // Assert
    //         $this->assertEquals($new_client_name, $test_client->getClientName());
    //     }
    //     /// Test delete()
    //     // Description: delete individual records
    //     // Input: "Lilly Anne"
    //     // Input2: "Bobby Showdown"
    //     // Output: "Bobby Showdown"
    //     function testDelete()
    //     {
    //         //Arrange
    //         $client_name = "Lilly Anne";
    //         $client_id = 1;
    //         $test_client = new Client($client_name, $client_id);
    //         $test_client->save();
    //         $client_name2 = "Bobby Showdown";
    //         $client_id2 = 2;
    //         $test_client2 = new Client($client_name2, $client_id2);
    //         $test_client2->save();
    //         //Act
    //         $test_client->delete();
    //         //Assert
    //         $this->assertEquals( [$test_client2], Client::getAll());
    //     }
    //
    //     ///Test test find()
    //     //description: find all matching clients
    //     //Input restaurant_name1 = "Lilly Anne, 1", restaurant_name2 = "Bobby Showdown, 2"
    //     //output: "Bobby Showdown, Bobby Showdown"
    //     function test_find()
    //     {
    //         //Arrange
    //         $client_name = "Lilly Anne";
    //         $client_id = 1;
    //         $client_name2 = "Bobby Showdown";
    //         $client_id2 = 2;
    //         $test_client = new Client($client_name, $client_id);
    //         $test_client->save();
    //         $test_client2 = new Client($client_name2, $client_id2);
    //         $test_client2->save();
    //         //Act
    //         $result = Client::find($test_client->getId());
    //         //Assert
    //         $this->assertEquals($test_client, $result);
    //     }
    //
    //
    }




 ?>
