<?php declare(strict_types=1);

namespace App;

class Deck
{
    private $suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
    private $faces = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
    private $deck = [];

    public function __construct()
    {
        $this->build();
    }

    /**
     * Build and shuffle deck
     */
    private function build(): void
    {
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $this->deck[] = [
                    'face' => $face,
                    'suit' => $suit,
                    'card' => "$face $suit"
                ];
            }
        }
        shuffle($this->deck);
    }

    /**
     * Get a card
     * @return array
     */
    public function deal(): array
    {
        return array_shift($this->deck);
    }
}