<?php

namespace TheRezor\BoardingCards;

use PHPUnit\Framework\TestCase;
use TheRezor\BoardingCards\Sorters\CardSorter;
use TheRezor\BoardingCards\Sorters\SortInterface;

class BoardingTest extends TestCase
{
    /**
     * @var  Boarding
     */
    private $boarding;

    /**
     * @var array
     */
    private $expected;

    /**
     * @var SortInterface
     */
    private $sorter;

    public function setUp()
    {
        $train = new Models\Train(
            'Madrid',
            'Barcelona',
            '72',
            '12'
        );


        $bus = new Models\Bus(
            'Barcelona',
            'Gerona',
            '72'
        );

        $plane1 = new Models\Plane(
            'Gerona',
            'Stockholm',
            '72',
            '12',
            '21',
            '424'
        );

        $plane2 = new Models\Plane(
            'Stockholm',
            'New York',
            '72',
            '12',
            '21',
            '424'
        );

        $this->sorter = new CardSorter();

        $this->boarding = new Boarding($plane1, $plane2, $train, $bus);

        $this->expected = [$train, $bus, $plane1, $plane2];
    }

    public function testSort()
    {
        $this->assertEquals($this->boarding->sortCards($this->sorter), $this->expected);
    }

    public function testToHtml()
    {
        $this->boarding->sortCards($this->sorter);

        $expected = '<ol><li>Take the Train from Madrid to Barcelona. Sit in seat 12. Train: 72.</li><li>Take the Bus from Barcelona to Gerona. Sit in seat 72.</li><li>Take the Plane from Gerona to Stockholm. Sit in seat 21. Gate: 12. Baggage ticket counter: 424.</li><li>Take the Plane from Stockholm to New York. Sit in seat 21. Gate: 12. Baggage ticket counter: 424.</li><li>You have arrived at your final destination.</li></ol>';

        $this->assertEquals($expected, $this->boarding->toHtml());
    }
}
