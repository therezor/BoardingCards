<?php

namespace TheRezor\BoardingCards\Sorters;

use TheRezor\BoardingCards\Models\AbstractCard;

class CardSorter implements SortInterface
{
    /**
     * @param array $arrivals
     * @return AbstractCard
     * @throws \Exception
     */
    protected function findFirstDeparture(array $arrivals)
    {
        foreach ($arrivals as $c) {
            if (!in_array($c->getDeparture(), $arrivals)) {
                return $c;
            }
        }

        throw new \Exception('First departure location not found');
    }

    /**
     * @param array $cards
     * @return array
     */
    public function sort(array $cards): array
    {
        // Return original array if nothing to sort
        if (count($cards) <= 1) {
            return $cards;
        }

        $sorted = [array_pop($cards)];

        for ($i = count($cards); $i > 0; $i--) {
            foreach ($cards as $key => $c) {
                if (end($sorted)->getArrival() == $c->getDeparture()) {
                    $sorted[] = $c;

                    unset($cards[$key]);
                } elseif (reset($sorted)->getDeparture() == $c->getArrival()) {
                    array_unshift($sorted, $c);

                    unset($cards[$key]);
                }
            }
        }

        return $sorted;
    }
}