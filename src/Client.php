<?php
    class Client
    {
        private $client_name;
        private $stylist_id;
        private $id;

        function __construct($client_name, $stylist_id, $id = null)
        {
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setClientName($new_name)
        {
            $this->client_name = (string) $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id) VALUES ('{$this->getClientName()}', '{$this->getStylistId()}')");
            $this->id= $GLOBALS['DB']->lastInsertId();
        }

        function updateClient($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setClientName($new_name);
        }

        function deleteClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = [];
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($client_name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

    }
?>
