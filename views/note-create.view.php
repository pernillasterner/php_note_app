<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<?php require('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <form action="" method="POST">
            <label for="body">Description</label>
            <div>
                <textarea name="body" id="body"></textarea>
            </div>

            <p>
                <button type="submit">Create</button>
            </p>
        </form>

    </div>
</main>
<?php require('partials/footer.php') ?>