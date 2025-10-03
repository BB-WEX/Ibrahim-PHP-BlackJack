<?php

class card
{
    private $suit;
    private $rank;
    private $value;

    public function __construct($suit, $rank, $value)
    {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
    }

    // getter function for each property
    public function getSuit()
    {
        return $this->suit;
    }
    public function getRank()
    {
        return $this->rank;
    }
    public function getValue()
    {
        return $this->value;
    }

}

?>