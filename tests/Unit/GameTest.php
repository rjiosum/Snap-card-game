<?php declare(strict_types=1);

namespace Tests\Unit;
use App\Deck;
use App\Game;
use App\Player;
use Tests\TestCase;
/** @property Game game */
class GameTest extends TestCase
{
    private $deck;
    private $game;
    protected function setUp(): void
    {
        parent::setUp();
        $this->deck = new Deck();
        $this->game = new Game($this->deck);
    }

    /** @test */
    public function has_players_property()
    {
        $property = $this->getPrivateProperty('App\Game', 'players');
        $this->assertEquals([], $property->getValue($this->game));
    }

    /** @test */
    public function can_create_players()
    {
        $this->game->createPlayer(new Player('Player01'));
        $this->game->createPlayer(new Player('Player02'));
        $players = $this->game->getPlayers();

        $this->assertEquals('Player01', $players[0]->getName());
        $this->assertEquals('Player02', $players[1]->getName());
    }

    /** @test */
    public function can_distribute_cards_to_each_players()
    {
        $expectedValue = 26;
        $playerOne = new Player('Player01');
        $playerTwo = new Player('Player02');
        $this->game->createPlayer($playerOne);
        $this->game->createPlayer($playerTwo);

        $method = $this->getPrivateMethod('App\Game', 'initDeal');
        $method->invoke($this->game);

        $this->assertEquals($expectedValue, $playerOne->cardCount());
        $this->assertEquals($expectedValue, $playerTwo->cardCount());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->deck);
        unset($this->game);
    }

}