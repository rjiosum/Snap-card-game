<?php declare(strict_types=1);

namespace App;
//TODO: class needs bit more refactoring and unit testing

class Game
{
    use Pile;
    protected $players = [];
    protected $currentPlayer;
    protected $gameOver = FALSE;
    protected $deck;

    /**
     * Game constructor.
     * @param Deck $deck
     */
    public function __construct(Deck $deck)
    {
        $this->deck = $deck;
    }

    /**
     * Add a player
     * @param Player $player
     */
    public function createPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    /**
     * @return array
     */
    public function getPlayers() : array
    {
        return $this->players;
    }

    public function start()
    {
        $this->CardDistributionMsg();

        $this->initDeal();

        while(!$this->gameOver) {
            foreach ($this->players as $player) {
                $card = $player->playCard();

                $lastCard = $this->lastCardOfPile();

                $this->addCardToPile($card);

                $this->PlayerMakeADealMsg($player, $card);

                if (!empty($lastCard) && $card['face'] == $lastCard['face']) {
                    $player->addCardsFromPile($this->pile);
                    $this->resetPile();
                    $this->PlayerWinsCurrentPileMsg($player);
                }

                if ($player->cardCount() == 0) {
                    $this->PlayerLostGameMsg($player);
                    $this->gameOver = TRUE;
                    break;
                }
                $this->flush();
            }
            sleep(1);
        }
    }



    protected function CardDistributionMsg(): void
    {
        echo 'Distributing cards to each player' . $this->eol();
    }

    /**
     * @param Player $player
     * @param $card
     */
    protected function PlayerMakeADealMsg($player, $card): void
    {
        echo $player->getName() . " deal (" . $player->cardCount() . ") : " . $card['card'] . $this->eol();
    }

    /**
     * @param Player $player
     */
    protected function PlayerWinsCurrentPileMsg($player): void
    {
        echo $this->eol() . $player->getName() . " wins the current pile." . $this->eol() . $this->eol();
    }

    /**
     * @param Player $player
     */
    protected function PlayerLostGameMsg($player): void
    {
        echo $this->eol() . $player->getName() . " lost the game, no cards remaining." . $this->eol();
    }

    //Quick Helpers
    public function flush(){
        if ($_SERVER['DOCUMENT_ROOT']) {
            flush();
            ob_flush();
        }
    }

    protected function eol()
    {
        return ($_SERVER['DOCUMENT_ROOT']) ? '<br>' : PHP_EOL;
    }
}