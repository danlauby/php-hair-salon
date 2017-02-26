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

        function getId()
        {
            return $this->id;
        }

        function setStylistName($new_stylist_name)
        {
            $this->stylist_name = $new_stylist_name;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }


        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name) VALUES ('{$this->getStylistName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        // function update($new_stylist_name)
        // {
        //     $GLOBALS['DB']->exec("UPDATE stylists SET '$new_stylist_name' WHERE id = {$this->getId()};");
        //     $this->setStylistName($new_stylist_name);
        // }
        //
        // function delete()
        // {
        //     $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        // }
        //
        // // static function getStylist($id)
        // // {
        // //
        // //     $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE id = {$id};");
        // //
        // //     $stylists = array();
        // //     foreach($returned_stylists as $stylist){
        // //         $new_stylist = $stylist['stylist_name'];
        // //         $new_id = $name['id'];
        // //         $new_stylist_object = new Stylist($new_stylist, $new_id);
        // //         array_push($stylists, $new_stylist_object);
        // //     }
        // //     return $stylists[0];
        // // }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = [];
            foreach($returned_stylists as $stylist) {
                $stylist_name = $stylist['stylist_name'];
                $id = $stylist['id'];
                $new_Stylist = new Stylist($stylist_name, $id);
                array_push($stylists, $new_Stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        static function find($new_id)
        {
            $match_stylist = null;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $new_id) {
                    $match_stylist = $stylist;
                }
            }
            return $match_stylist;
        }

        // static function getMatch($stylist_id)
        // {
        //     $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE stylist_id = {$stylist_id};");
        //     var_dump($returned_stylists);
        //     $stylists = array();
        //     foreach ($returned_stylists as $returned_stylist){
        //         $new_stylist_name = $name['stylist_name'];
        //         $new_id = $name['id'];
        //         $new_stylist_object = new Stylist($new_stylist_name, $new_id);
        //         array_push($stylists, $new_stylist_object);
        //     }
        //     return $stylists;
        // }

    }
 ?>
