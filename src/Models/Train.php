<?php

namespace TheRezor\BoardingCards\Models;

class Train extends AbstractCard
{
    /**
     * @var string
     */
    protected $train;

    /**
     * Train constructor.
     * @param string $departure
     * @param string $arrival
     * @param string $train
     * @param string|null $seat
     */
    public function __construct($departure, $arrival, $train, $seat = null)
    {
        parent::__construct('Train', $departure, $arrival, $seat);

        $this->train = $train;
    }

    /**
     * @return string
     */
    public function getTrain(): string
    {
        return $this->train;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = parent::__toString();

        $string .= " Train: {$this->train}.";

        return $string;
    }
}