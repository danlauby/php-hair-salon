<?php
    class Stylist
    {
        private $stylist_name;
        private $id;

        function __construct($stylist_name, $id = null)
        {
            $this->stylist_name = $stylist_name;
            $this->id = $id;
        }

        function setStylistName($new_stylist_name)
        {
            $this->stylist_name = $new_stylist_name;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists(stylist_name) VALUES ('{$this->getStylistName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {

        }

        function delete()
        {

        }

        static function getAll()
        {

        }

        static function deleteAll()
        {

        }

        static function find()
        {

        }
    }
 ?>
