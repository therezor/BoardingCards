<?php

namespace TheRezor\BoardingCards;

use TheRezor\BoardingCards\Sorters\CardSorter;
use TheRezor\BoardingCards\Models\Plane;
use TheRezor\BoardingCards\Models\Train;
use TheRezor\BoardingCards\Models\Bus;

require '../vendor/autoload.php';


$train = new Train(
    'Madrid',
    'Barcelona',
    '78A',
    '45B'
);


$bus = new Bus(
    'Barcelona',
    'Gerona'
);

$plane1 = new Plane(
    'Gerona',
    'Stockholm',
    'SK455',
    '45B',
    '3A',
    '344'
);

$plane2 = new Plane(
    'Stockholm',
    'New York',
    'SK22',
    '22,',
    '7B'
);


$boarding = new Boarding($train, $bus, $plane1, $plane2);

$sorter = new CardSorter();
$boarding->sortCards($sorter);
echo $boarding->toHtml();