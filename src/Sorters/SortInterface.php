<?php

namespace TheRezor\BoardingCards\Sorters;


interface SortInterface
{
    /**
     * @param array $cards
     * @return mixed
     */
    public function sort(array $cards);
}