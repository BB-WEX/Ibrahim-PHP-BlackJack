<?php
// Include the card, deck, player and dealer classes
// Make sure names match with the names of files
require_once "card.php";
require_once "deck.php";
require_once "player.php";
require_once "dealer.php";

// Initalise a new deck and shuffle
$deck = new deck();
$deck->shuffle_deck();

// Create an instanc of bothe player and dealer
$player = new Player("Player");
$player = new dealer("Dealer");


// Game logic
// Deal initial cards
$player->draw_card($deck->deal_card());
$dealer->draw_card($deck->deal_card());
$player->draw_card($deck->deal_card());
$dealer->draw_card($deck->deal_card());

// Display hands
$dealer->display_first_card();
$player->display_hand();

// logic for player taking turns
while ($player->calculate_hand_value() < 21) {
    // If hand less than 17 hit
    if ($player->calculate_hand_value() < 17) {
        $plater->draw_card($deck->deal_card());
        $player->display_hand();
    } else {
        break;
    }
}

// Dealer's turn logic
while ($dealer->calculate_hand_value() < 17) {
    // IF hand less than 17 hit
    $dealer->draw_card($deck->deal_card());
}

// Display final hands
echo "<br>Final Hands:<br>";
echo "Dealer's Hand: ";
$dealer->display_hand();
echo "<br>Player's Hand: ";
$player->display_hand();


// Determine winner through total scores
$player_total = $player->calculate_hand_value();
$dealer_total = $dealer->calculate_hand_value();

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
?>