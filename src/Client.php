<?php
    class Client
    {
        private $client_name;
        private $id;
        private $stylist_id;

        function __construct($client_name, $assigned_stylist_id, $id = null)
        {
            $this->client_name = $client_name;
            $this->id = $id;
            $this->stylist_id = $assigned_stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function getclientName()
        {
            return $this->client_name;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }

        function getSylistId()
        {
            return $this->stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id) VALUES ('{$this->getClientName()}', {$this->getSylistId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        // function update($new_client_name)
        // {
        //     $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$new_client_name}' WHERE id = {$this->getId()};");
        //     $this->setStylistName($new_client_name);
        // }

        // function delete()
        // {
        //     $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        //     $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        // }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = [];
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_Client = new Client($client_name, $stylist_id, $id);
                array_push($clients, $new_Client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        // static function find($new_id)
        // {
        //     $match_client = null;
        //     $clients = Client::getAll();
        //     foreach ($clients as $client) {
        //         $client_id = $client->getId();
        //         if ($client_id == $new_id) {
        //             $match_client = $client;
        //         }
        //     }
        //     return $match_client;
        // }
    }
 ?>
