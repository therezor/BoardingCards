<?php

namespace TheRezor\BoardingCards\Models;


interface CardInterface
{
    /**
     * Transport type
     *
     * @return string
     */
    public function getType();

    /**
     * Departure place
     *
     * @return string
     */
    public function getDeparture();

    /**
     * Arrival destination
     *
     * @return string
     */
    public function getArrival();

    /**
     * Reserved passenger seat
     *
     * @return string|null
     */
    public function getSeat();
}