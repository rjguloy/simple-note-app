<?php

use Illuminate\Support\Collection;

require_once __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([1, 2, 3, 4, 5]);

if ($numbers->contains(10)) {
    echo "The collection contains the number 10.";
}

$greaterThanTwo = $numbers->filter(function ($number) {
    return $number > 2;
});

var_dump($greaterThanTwo);

// ->each(function ($number) {
//     echo $number . "\n";
// });