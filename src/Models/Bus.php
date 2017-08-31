<?php

namespace TheRezor\BoardingCards\Models;


class Bus extends AbstractCard
{
    /**
     * Bus constructor.
     * @param string $departure
     * @param string $arrival
     * @param string|null $seat
     */
    public function __construct($departure, $arrival, $seat = null)
    {
        parent::__construct('Bus', $departure, $arrival, $seat);
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