<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Demo</title>
    <style>
      body {
          display: grid;
          place-items: center;
          height: 100vh;
          font-family: sans-serif;
      }
    </style>
  </head>
  <body>
    <h1> 
      <?php 
      $name = "Dark Matter"; 
      $read = false;
      ?> 
      You have<?php echo ! $read ? ' not': '' ?> read "<?php echo $name ?>"
    </h1>
    <?php 
      $books = [
        'Do Androids Dream of Electric Sheep',
        'The Langoliers',
        'Hail Mary'
      ];
    ?>
    <h2>Recommended Books</h2>
    <ul>
      <?php
        foreach ($books as $book) {
          echo "<li>{$book}</li>";
        }
      ?>
    </ul>
    <h1>Recommended Books</h1>
    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?=$book['name']?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
  </body>
</html>