<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Deck;
use Tests\TestCase;
/** @property Deck $deck */
class DeckTest extends TestCase
{
    private $deck;

    protected function setUp(): void
    {
        parent::setUp();
        $this->deck = new Deck();
    }

    /** @test */
    public function has_suits_property()
    {
        $expectedValue = ["Spades", "Hearts", "Clubs", "Diamonds"];
        $property = $this->getPrivateProperty('App\Deck', 'suits');
        $this->assertEquals($expectedValue, $property->getValue($this->deck));
    }

    /** @test */
    public function has_faces_property()
    {
        $expectedValue = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
        $property = $this->getPrivateProperty('App\Deck', 'faces');
        $this->assertEquals($expectedValue, $property->getValue($this->deck));
    }

    /** @test */
    public function can_build_deck()
    {
        $expectedValue = 52;
        $property = $this->getPrivateProperty('App\Deck', 'deck');
        $this->assertCount($expectedValue, $property->getValue($this->deck));
    }

    /** @test */
    public function can_get_a_card_or_make_a_deal()
    {
        $card = $this->deck->deal();
        $this->assertArrayHasKey('face', $card);
        $this->assertArrayHasKey('suit', $card);
        $this->assertArrayHasKey('card', $card);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->deck);
    }
}