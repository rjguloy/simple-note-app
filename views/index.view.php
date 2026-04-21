<?php require_once "partials/head.php" ?>
<?php require_once "partials/nav.php" ?>
<?php require_once "partials/banner.php" ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p>Hello <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page.</p>
        <!-- <h1>Recommended Books</h1>
        <ul>
            <?php foreach ($filteredBooks as $book) : ?>
                <li>
                    <a href="<?= $book['purchaseUrl'] ?>">
                        <?=$book['name']?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul> -->
    </div>
</main>
<?php require_once "partials/footer.php" ?>