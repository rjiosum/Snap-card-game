<?php declare(strict_types=1);

namespace App;

class Player
{
    private $playerName;
    private $cards = [];

    public function __construct($playerName)
    {
        $this->playerName = $playerName;
    }

    /**
     * Get name of player
     * @return string
     */
    public function getName(): string
    {
        return $this->playerName;
    }

    /**
     * Get total card count
     * @return int
     */
    public function cardCount(): int
    {
        return count($this->cards);
    }

    /**
     * Add one card at a time
     * @param $card
     */
    public function addCard($card): void
    {
        $this->cards[] = $card;
    }

    /**
     * Add cards from pile
     * @param $cards
     */
    public function addCardsFromPile($cards): void
    {
        $this->cards = array_merge($this->cards, $cards);
    }

    /**
     * Player plays a card
     * @return mixed
     */
    public function playCard()
    {
        return array_pop($this->cards);
    }
}