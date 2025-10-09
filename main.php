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
    $player = new Player("Player 1");
    $player = new dealer("Dealer");
    
?>