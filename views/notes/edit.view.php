<?php view('partials/head.php');?>
<?php view('partials/nav.php', ['header' => $header]); ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id']?>">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full">
                                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea
                                            id="body"
                                            name="body"
                                            rows="3"


                                            placeholder="Write here your ideas..."
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    ><?= $note['body'] ?></textarea>

                                    <?php if(isset($errors['body'])) : ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['body']?></p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/note?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >Cancel</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >Update</button>
                </div>
            </form>

<!--            <form method="POST" class="mt-4">-->
<!--                <input type="hidden" name="_method" value="DELETE">-->
<!--                <input type="hidden" name="id" value="--><?php //=$note['id']?><!--">-->
<!--                <button type="submit" class="text-green-300 text-xs mt-4">Delete</button>-->
<!--            </form><br>-->


            <p class="mt-6">Back to <a href="/notes" class="text-red-300 hover:underline">My Notes</a></p>

        </div>
    </main>



<?php view('partials/footer.php'); ?>