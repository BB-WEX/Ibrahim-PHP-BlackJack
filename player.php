<?php 

 class player {
    private $name;
    private $hand;

    public function __construct($name) {
        $this->name = $name;

        $this->hand = [];
    }
 }

?>