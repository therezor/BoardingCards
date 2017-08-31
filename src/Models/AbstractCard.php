<?php

namespace TheRezor\BoardingCards\Models;


abstract class AbstractCard implements CardInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $departure;

    /**
     * @var string
     */
    protected $arrival;

    /**
     * @var string|null
     */
    protected $seat;

    /**
     * AbstractCard constructor.
     * @param string $type
     * @param string $departure
     * @param string $arrival
     * @param string|null $seat
     */
    public function __construct($type, $departure, $arrival, $seat = null)
    {
        $this->type = $type;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(): string
    {
        return $this->arrival;
    }

    /**
     * @return null|string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = "Take the {$this->type} from {$this->departure} to {$this->arrival}. ";
        $string .= ($this->seat ? "Sit in seat {$this->seat}." : "No seat assignment.");

        return $string;
    }
}