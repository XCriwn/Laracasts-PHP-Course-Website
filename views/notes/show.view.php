<?php view('partials/head.php'); ?>
<?php view('partials/nav.php', ['header' => $header]); ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <h3 class="text-red-800"><?= htmlspecialchars($note['body'])?></h3>
            <footer class="mt-6">
                <a href="note/edit?id=<?= $note['id'] ?>" class="text-green-300 text-xs mt-6 border border-current rounded px-4 py-2">Edit</a>
            </footer>



            <p class="mt-4">Back to <a href="/notes" class="text-red-300 hover:underline">My Notes</a></p>

        </div>
    </main>



<?php view('partials/footer.php') ?>