<?php

namespace TheRezor\BoardingCards;

use PHPUnit\Framework\TestCase;
use TheRezor\BoardingCards\Sorters\CardSorter;
use TheRezor\BoardingCards\Sorters\SortInterface;
use TheRezor\BoardingCards\Models\Plane;
use TheRezor\BoardingCards\Models\Train;
use TheRezor\BoardingCards\Models\Bus;

class CardSorterTest extends TestCase
{
    protected $sorter;

    public function setUp()
    {
        $this->sorter = new CardSorter();
    }

    public function testInstanceOfInterface()
    {
        $this->assertInstanceOf(SortInterface::class, $this->sorter);
    }

    /**
     * @dataProvider cardsProvider
     */
    public function testSort($cards, $expected)
    {
        $sorted = $this->sorter->sort($cards);

        $this->assertEquals($expected, $sorted);
    }


    public function testEmptySort()
    {
        $sorted = $this->sorter->sort([]);

        $this->assertEmpty($sorted);
    }

    public function cardsProvider()
    {
        $plane1 = new Plane(
            'Kyiv',
            'Zhytomur',
            'CE3',
            'D1',
            '12B',
            '13'
        );

        $plane2 = new Plane(
            'Mariupol',
            'Lviv',
            'CB3',
            'D2',
            '3F'
        );

        $bus1 = new Bus(
            'Donetsk',
            'Mariupol',
            '26'
        );

        $bus2 = new Bus(
            'Lviv',
            'Kyiv'
        );

        $train1 = new Train(
            'Cherkasu',
            'Krakov',
            'KL23',
            '33'
        );

        $train2 = new Train(
            'Zhytomur',
            'Cherkasu',
            'E231',
            '34'
        );

        $set1 = [$plane1, $plane2, $train1, $train2, $bus1, $bus2];
        $set2 = [$plane1, $train1, $train2];
        $set3 = [$plane1];

        $expectedSet1 = [$bus1, $plane2, $bus2, $plane1, $train2, $train1];
        $expectedSet2 = [$plane1, $train2, $train1];
        $expectedSet3 = [$plane1];

        return [
            [$set1, $expectedSet1],
            [$set2, $expectedSet2],
            [$set3, $expectedSet3],
        ];
    }
}
