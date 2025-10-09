<?php

require_once "card.php";

class deck
{
    private $cards;

    public function __construct()
    {
        $this->cards = [];
    }

    public function initialise_deck()
    {
        $suits = ["Hearts", "Diamonds", "Clubs", "Spades"];
        $ranks = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace"];
        $values = [2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10, 11];

        foreach ($suits as $suit) {
            foreach ($ranks as $index => $rank) {
                $value = $values[$index];
                // inisialise a new card, pass each attribute into it to create deck
                $card = new card($suit, $rank, $value);
                // The new card object is passed into the array on line 11
                $this->cards[] = $card;
            }
        }
    }

    // shuffle the deck
    public function shuffle_deck()
    {
        shuffle($this->cards);
    }

    // deal a card from deck 
    public function deal_card()
    {
        return array_pop($this->cards);
    }
}

?>