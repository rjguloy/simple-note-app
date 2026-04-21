<?php

test('it can resolve something out of the container', function () {
    //arrange
    $container = new Core\Container;

    $container->bind('greeting', fn() => 'Hello, World!');
    //act
    $result = $container->resolve('greeting');

    //assert
    expect($result)->toBe('Hello, World!');

});
