<?php declare(strict_types=1);

require_once __DIR__."/vendor/autoload.php";

use App\Deck;
use App\Game;
use App\Player;

$deck = new Deck();
$game = new Game($deck);

$player1 = new Player('Player01');
$player2 = new Player('Player02');

$game->createPlayer($player1);
$game->createPlayer($player2);

$game->flush();

$game->start();
