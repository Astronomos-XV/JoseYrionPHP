<?php


$_SESSION['comments'] = $_SESSION['comments'] ?? [];


function addComment($pokemonName, $comment) {
    if (!empty($comment)) {
        $_SESSION['comments'][$pokemonName][] = $comment;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {
    $pokemonName = $_POST['pokemon'];
    $comment = trim($_POST['comment']);
    addComment($pokemonName, $comment);
    header("Location: index.php?pokemon=" . urlencode($pokemonName));
    exit;
}


$pokemonName = isset($_GET['pokemon']) ? $_GET['pokemon'] : null;
?>

<?php if ($pokemonName): ?>
<div class="mt-6">
    <h3 class="text-lg font-semibold text-gray-800">Comentarios</h3>
    

    <form method="POST" class="mt-2">
        <input type="hidden" name="pokemon" value="<?= htmlspecialchars($pokemonName) ?>">
        <textarea name="comment" 
                  class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                  placeholder="Añade un comentario..." 
                  rows="3"></textarea>
        <button type="submit" 
                name="add_comment" 
                class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
            Comentar
        </button>
    </form>


    <?php if (!empty($_SESSION['comments'][$pokemonName])): ?>
        <div class="mt-4 space-y-2">
            <?php foreach ($_SESSION['comments'][$pokemonName] as $comment): ?>
                <div class="p-3 bg-gray-100 rounded-md">
                    <p class="text-gray-700"><?= htmlspecialchars($comment) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="mt-2 text-gray-500">No hay comentarios aún. ¡Sé el primero en comentar!</p>
    <?php endif; ?>
</div>
<?php endif; ?>