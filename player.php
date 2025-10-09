<?php

class player
{
    protected $name;
    protected $hand;

    public function __construct($name)
    {
        $this->name = $name;

        $this->hand = [];
    }

    // Method to draw a card and add it to the player's hand
    public function draw_card($card)
    {
        $this->hand[] = $card;
    }

    // Method to calculate total
    public function calculate_hand_value()
    {
        $value = 0;
        $aces = 0;
        foreach ($this->hand as $card) {
            $value += $card->getValue();
            if ($card->getRank() == "Ace") {
                $aces++;
            }
        }
        while ($value > 21 && $aces > 0) {
            $value -= 10;
            $aces--;
        }
        return $value;
    }

    // Method to show hand
    public function display_hand()
    {
        echo "{$this->name}'s hand: ";
        foreach ($this->hand as $card) { {
                echo $card->getRank() . " of " . $card->getSuit() . ", ";
            }
            echo " Total value: " . $this->calculate_hand_value() . "<br>";
        }
    }
}

?>