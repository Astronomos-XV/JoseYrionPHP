<?php

if (!isset($selectedPokemon)) {
    exit("No se ha seleccionado ningún Pokémon.");
}
?>

<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-lg w-full mx-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold capitalize text-gray-800"><?= $selectedPokemon['name'] ?></h2>
            <a href="index.php" class="text-gray-500 hover:text-gray-700 text-xl font-bold">X</a>
        </div>
        
        <img src="<?= $selectedPokemon['sprites']['front_default'] ?>" 
             alt="<?= $selectedPokemon['name'] ?>" 
             class="w-48 h-48 mx-auto">
        
        <div class="mt-4 space-y-2">
            <p><strong>Tipo:</strong> 
                <?= implode(", ", array_map(fn($type) => $type['type']['name'], $selectedPokemon['types'])) ?>
            </p>
            <p><strong>Habilidades:</strong> 
                <?= implode(", ", array_map(fn($ability) => $ability['ability']['name'], $selectedPokemon['abilities'])) ?>
            </p>
            <p><strong>Altura:</strong> <?= $selectedPokemon['height'] / 10 ?> m</p>
            <p><strong>Peso:</strong> <?= $selectedPokemon['weight'] / 10 ?> kg</p>
        </div>

        <!-- Incluir la sección de comentarios -->
        <?php include 'comentarios.php'; ?>
    </div>
</div>
</div>