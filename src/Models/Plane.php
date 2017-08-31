<?php

namespace TheRezor\BoardingCards\Models;


class Plane extends AbstractCard
{
    /**
     * @var string
     */
    protected $flight;

    /**
     * @var string
     */
    protected $gate;

    /**
     * @var string|null
     */
    protected $baggage;

    /**
     * Plane constructor.
     * @param string $departure
     * @param string $arrival
     * @param string $flight
     * @param string|null $gate
     * @param string|null $seat
     * @param string|null $baggage
     */
    public function __construct($departure, $arrival, $flight, $gate, $seat = null, $baggage = null)
    {
        parent::__construct('Plane', $departure, $arrival, $seat);

        $this->flight = $flight;
        $this->gate = $gate;
        $this->baggage = $baggage;
    }

    /**
     * @return string
     */
    public function getFlight(): string
    {
        return $this->flight;
    }

    /**
     * @return string
     */
    public function getGate(): string
    {
        return $this->gate;
    }

    /**
     * @return null|string
     */
    public function getBaggage()
    {
        return $this->baggage;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = parent::__toString();

        $string .= " Gate: {$this->gate}.";

        $string .= ($this->baggage ? " Baggage ticket counter: {$this->baggage}." : "Automatically transferred");

        return $string;
    }
}