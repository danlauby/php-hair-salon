<?php
    class Client
    {
        private $client_name;
        private $client_id;
        private $id;

        function __construct($client_name, $client_id = null, $id = null)
        {
            $this->client_name = $client_name;
            $this->client_id = $client_id;
            $this->id = $id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients(client_name) VALUES ('{$this->getClientName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_client_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET '$new_client_name' WHERE id = {$this->getId()};");
            $this->setClientName($new_client_name);
        }

        function delete()
        {

        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients");
            $clients = [];
            foreach ($returned_clients as $client) {
                $new_client_name = $client['client_name'];
                $new_stylist_id = $client['stylist_id'];
                $new_id = $client['id'];
                var_dump($new_id);
                $new_Client = new Client($new_client_name, $new_stylist_id, $new_id);
                array_push($clients, $new_Client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients");
        }

        static function find()
        {

        }

    }
 ?>
