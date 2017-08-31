<?php

namespace TheRezor\BoardingCards;

use TheRezor\BoardingCards\Models\AbstractCard;
use TheRezor\BoardingCards\Sorters\SortInterface;


class Boarding
{
    /**
     * @var AbstractCard[]
     */
    private $cards;

    /**
     * Boarding constructor.
     * @param AbstractCard[] ...$cards
     */
    public function __construct(AbstractCard ...$cards)
    {
        $this->cards = $cards;
    }

    /**
     * Sort boarding cards using specified sort algorithm
     *
     * @param SortInterface $sorter
     *
     * @return array
     */
    public function sortCards(SortInterface $sorter): array
    {
        return $this->cards = $sorter->sort($this->cards);
    }

    /**
     * Get all boarding cards
     *
     * @return AbstractCard[]
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Output html formatted boarding cards
     *
     * @return string
     */
    public function toHtml()
    {
        $string = '<ol>';

        foreach ($this->cards as $c) {
            $string .= "<li>{$c}</li>";
        }

        $string .= '<li>You have arrived at your final destination.</li>';
        $string .= '</ol>';

        return $string;
    }
}