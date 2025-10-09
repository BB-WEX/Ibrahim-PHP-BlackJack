<?php

// require throws error and loads multiple times
// includes throws no error and loads multiple times

require_once 'player.php';

class dealer extends player
{

    public function display_first_card()
    {
        if (count($this->hand) > 0) {
            $card = $this->hand[0];
            echo "{$this->name}'s first card: " . $card->getRank() . " of " . $card->getSuit() . "<br>";
        }
    }
}

?>