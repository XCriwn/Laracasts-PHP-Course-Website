<?php view('partials/head.php'); ?>
<?php view('partials/nav.php', ['header' => $header]); ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
            <?php foreach ($notes as $note):?>
                <a href="/note?id=<?= $note['id']?>" class="text-red-300 hover:underline">
                    <li><?= htmlspecialchars($note['body'])?></li>
                </a>
            <?php endforeach; ?>
            </ul>
            <p class="mt-6">
                <a href="note/create" class="text-red-100 hover:underline">Create Note</a>
            </p>
        </div>
    </main>



<?php view('partials/footer.php') ?>