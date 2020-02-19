<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Player;
use Tests\TestCase;

/**
 * @property Player $player
 */
class PlayerTest extends TestCase
{
    private $player;

    protected function setUp(): void
    {
        parent::setUp();
        $this->player = new Player('Player01');
    }

    /** @test */
    public function can_set_and_return_player_name()
    {
        $this->assertEquals('Player01', $this->player->getName());
    }

    /** @test */
    public function has_cards_property()
    {
        $property = $this->getPrivateProperty('App\Player', 'cards');
        $this->assertEquals([], $property->getValue($this->player));
    }

    /** @test */
    public function can_add_a_card()
    {
        $card = ['face' => 'A', 'suit' => 'Spades', 'card' => "A Spades"];
        $this->player->addCard($card);
        $property = $this->getPrivateProperty('App\Player', 'cards');
        $this->assertEquals($card, $property->getValue($this->player)[0]);
    }

    /** @test */
    public function can_add_a_card_from_pile()
    {
        $pile = ['face' => 'A', 'suit' => 'Spades', 'card' => "A Spades"];
        $this->player->addCardsFromPile($pile);
        $property = $this->getPrivateProperty('App\Player', 'cards');
        $this->assertEquals($pile, $property->getValue($this->player));
    }

    /** @test */
    public function can_count_cards()
    {
        $expected = 2;
        $card01 = ['face' => 'A', 'suit' => 'Spades', 'card' => "A Spades"];
        $this->player->addCard($card01);
        $card02 = ['face' => '2', 'suit' => 'Clubs', 'card' => "2 Clubs"];
        $this->player->addCard($card02);
        $property = $this->getPrivateProperty('App\Player', 'cards');
        $this->assertCount($expected, $property->getValue($this->player));
    }

    /** @test */
    public function can_play_a_card_onto_pile()
    {
        $card01 = ['face' => 'A', 'suit' => 'Spades', 'card' => "A Spades"];
        $this->player->addCard($card01);
        $card02 = ['face' => '2', 'suit' => 'Clubs', 'card' => "2 Clubs"];
        $this->player->addCard($card02);
        $card = $this->player->playCard();
        $this->assertEquals($card02, $card);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->player);
    }
}