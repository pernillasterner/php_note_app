
TODO:

1. Make current user dynamic and check if user can create notes.

2. Add delete button on single note page


<form class="mt-6" method="POST">
    <!-- Send hidden method DELETE  -->
    <input type="hidden" name="_method" value="DELETE">
    <!-- Send hidden note id with POST request. -->
    <input type="hidden" name="id" value="<?= $note['id']; ?>">
    <button class="text-sm text-red-500">Delete</button>
</form>