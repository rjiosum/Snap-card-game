<?php declare(strict_types=1);

namespace App;

trait Pile
{
    protected $pile = [];

    /**
     * Dealer distributes cards to each player
     */
    protected function initDeal(): void
    {
        if (!empty($this->players)) {
            for ($i = 26; $i > 0; $i--) // since only two players so 26 cards each.
            {
                foreach ($this->players as $player) {
                    /** @var Player $player */
                    $player->addCard($this->deck->deal());
                }
            }
        }
    }

    /**
     * Reset Pile
     */
    protected function resetPile(): void
    {
        $this->pile = [];
    }

    /**
     * @return array
     */
    protected function lastCardOfPile(): array
    {
        $lastCard = (count($this->pile) > 0) ? $this->pile[count($this->pile) - 1] : [];
        return $lastCard;
    }

    /**
     * @param $card
     */
    protected function addCardToPile($card): void
    {
        array_push($this->pile, $card);
    }
}

