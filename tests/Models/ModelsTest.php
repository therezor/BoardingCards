<?php

use TheRezor\BoardingCards\Models\Bus;
use TheRezor\BoardingCards\Models\Train;
use TheRezor\BoardingCards\Models\Plane;
use TheRezor\BoardingCards\Models\CardInterface;
use PHPUnit\Framework\TestCase;

class ModelsTest extends TestCase
{
    public function testBus()
    {
        $bus = new Bus('Kyiv', 'Lviv');

        $this->assertInstanceOf(CardInterface::class, $bus);
        $this->assertEquals($bus->getType(), 'Bus');
        $this->assertEquals($bus->getDeparture(), 'Kyiv');
        $this->assertEquals($bus->getArrival(), 'Lviv');
        $this->assertEmpty($bus->getSeat());
    }

    public function testTrain()
    {
        $train = new Train('Kyiv', 'Lviv', 'EF21', 'S33');

        $this->assertInstanceOf(CardInterface::class, $train);
        $this->assertEquals($train->getType(), 'Train');
        $this->assertEquals($train->getDeparture(), 'Kyiv');
        $this->assertEquals($train->getArrival(), 'Lviv');
        $this->assertEquals($train->getTrain(), 'EF21');
        $this->assertEquals($train->getSeat(), 'S33');
    }

    public function testPlane()
    {
        $plane = new Plane('Kyiv', 'Lviv', 'EF21', 'D3', '13F');

        $this->assertInstanceOf(CardInterface::class, $plane);
        $this->assertEquals($plane->getType(), 'Plane');
        $this->assertEquals($plane->getDeparture(), 'Kyiv');
        $this->assertEquals($plane->getArrival(), 'Lviv');
        $this->assertEquals($plane->getFlight(), 'EF21');
        $this->assertEquals($plane->getGate(), 'D3');
        $this->assertEquals($plane->getSeat(), '13F');
    }
}
