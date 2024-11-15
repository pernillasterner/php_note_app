<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<?php require('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="text-pink-500">Selected note</h2>
        <p><?= $note['body'] ?></p>
    </div>
</main>
<?php require('partials/footer.php') ?>