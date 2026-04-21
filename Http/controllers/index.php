<?php 

$books = [
    [
        'name'          => 'Do Androids Dream of Electric Sheep',
        'author'        => 'Philip K. Dick',
        'releaseYear'   => 1968,
        'purchaseUrl'   => 'http://example.com'
    ],
    [
        'name'          => 'Project Hail Mary',
        'author'        => 'Andy Weir',
        'releaseYear'   => 2021,
        'purchaseUrl'   => 'http://example.com'
    ],
    [
        'name'          => 'The Martian',
        'author'        => 'Andy Weir',
        'releaseYear'   => 2011,
        'purchaseUrl'   => 'http://example.com'
    ]
];

// array_filter() is the same as this filter() function
// function filter($items, $fn) {
//     $filteredItems = [];

//     foreach($items as $item) {
//         if ($fn($item)) {
//             $filteredItems[] = $item;
//         }
//     }

//     return $filteredItems;
// }

// $filteredBooks = filter($books, function($book) {
//     return $book['releaseYear'] >= 2000;
// });

$filteredBooks = array_filter($books, function($book) {
    return $book['releaseYear'] >= 2000;
});

view("index.view.php", ['heading' => 'Home']);