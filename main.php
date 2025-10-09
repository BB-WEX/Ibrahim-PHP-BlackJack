<?php
// Include the card, deck, player and dealer classes
// Make sure names match with the names of files
require_once "card.php";
require_once "deck.php";
require_once "player.php";
require_once "dealer.php";

class BlackJack
{

    public $deck;
    public $player;
    public $dealer;

    public function __construct()
    {
        // Initalise a new deck and shuffle
        $this->deck = new deck();
        $this->deck->initialise_deck();
        $this->deck->shuffle_deck();

        // Create an instanc of bothe player and dealer
        $this->player = new Player("Player");
        $this->dealer = new dealer("Dealer");

    }
    public function start_game()
    {
        // Deal initial cards
        $this->player->draw_card($this->deck->deal_card());
        $this->dealer->draw_card($this->deck->deal_card());
        $this->player->draw_card($this->deck->deal_card());
        $this->dealer->draw_card($this->deck->deal_card());

        // Display hands
        $this->dealer->display_first_card();
        $this->player->display_hand();

        // logic for player taking turns
        while ($this->player->calculate_hand_value() < 21) {
            // If hand less than 17 hit
            if ($this->player->calculate_hand_value() < 17) {
                $this->player->draw_card($this->deck->deal_card());
                $this->player->display_hand();
            } else {
                break;
            }
        }

        // Dealer's turn logic
        while ($this->dealer->calculate_hand_value() < 17) {
            // IF hand less than 17 hit
            $this->dealer->draw_card($this->deck->deal_card());
        }

        // Display final hands
        echo "<br>Final Hands:<br>";
        $this->dealer->display_hand();
        $this->player->display_hand();

        // winner
        $this->determine_winner();

    }

    private function determine_winner()
    {

        // Determine winner through total scores
        $player_total = $this->player->calculate_hand_value();
        $dealer_total = $this->dealer->calculate_hand_value();

        if ($player_total > 21) {
            echo "Player busts! Dealer wins!";
        } elseif ($dealer_total > 21) {
            echo "Dealer busts! Player wins!";
        } elseif ($player_total > $dealer_total) {
            echo "Player wins with $player_total against dealer's $dealer_total!";
        } elseif ($dealer_total > $player_total) {
            echo "Dealer wins with $dealer_total against player's $player_total!";
        } else {
            echo "It's a tie at $player_total!";
        }
    }
}

$game = new BlackJack();
$game->start_game();

?>