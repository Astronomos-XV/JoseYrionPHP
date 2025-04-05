<?php
session_start();


$_SESSION['likes'] = $_SESSION['likes'] ?? [];
$_SESSION['hidden'] = $_SESSION['hidden'] ?? [];
$_SESSION['comments'] = $_SESSION['comments'] ?? [];

# Si desea cambiar el numero de pokemones mostrados, posdata si no quiere una bomba casera en su casa ponga un limite razonable
function getPokemonData($limit = 6) {
    $url = "https://pokeapi.co/api/v2/pokemon?limit=$limit";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    return $data['results'];
}


function getPokemonDetails($url) {
    $response = file_get_contents($url);
    return json_decode($response, true);
}

$pokemons = getPokemonData();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pokemonName = $_POST['pokemon'] ?? null;
    
    if (isset($_POST['like'])) {
        if (in_array($pokemonName, $_SESSION['likes'])) {
            $_SESSION['likes'] = array_diff($_SESSION['likes'], [$pokemonName]);
        } else {
            $_SESSION['likes'][] = $pokemonName;
        }
    }
    
    if (isset($_POST['hide'])) {
        $_SESSION['hidden'][] = $pokemonName;
    }
    
    if (isset($_POST['unhide_all'])) {
        $_SESSION['hidden'] = []; 
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-red-600">Pokémon Blog</h1>
        
    
        <?php if (!empty($_SESSION['hidden'])): ?>
            <div class="text-center mb-6">
                <form method="POST">
                    <button type="submit" name="unhide_all" 
                            class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">
                        Mostrar Pokémon Ocultados (<?= count($_SESSION['hidden']) ?>)
                    </button>
                </form>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            <?php foreach ($pokemons as $pokemon): 
                if (!in_array($pokemon['name'], $_SESSION['hidden'])):
                    $details = getPokemonDetails($pokemon['url']);
            ?>
                <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition">
                    <img src="<?= $details['sprites']['front_default'] ?>" 
                         alt="<?= $pokemon['name'] ?>" 
                         class="w-32 h-32 mx-auto">
                    <h2 class="text-xl font-semibold text-center capitalize mt-2">
                        <?= $pokemon['name'] ?>
                    </h2>
                    
                    <div class="flex justify-between mt-4">
                        <form method="POST">
                            <input type="hidden" name="pokemon" value="<?= $pokemon['name'] ?>">
                            <button type="submit" name="like" 
                                    class="text-red-500 hover:text-red-700">
                                <svg class="w-6 h-6 <?= in_array($pokemon['name'], $_SESSION['likes']) ? 'fill-current' : '' ?>" 
                                     viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </button>
                        </form>
                        
                        <form method="POST">
                            <input type="hidden" name="pokemon" value="<?= $pokemon['name'] ?>">
                            <button type="submit" name="hide" 
                                    class="text-gray-500 hover:text-gray-700">
                                Ocultar
                            </button>
                        </form>
                        
                        <a href="?pokemon=<?= $pokemon['name'] ?>" 
                           class="text-blue-500 hover:text-blue-700">
                            Detalles
                        </a>
                    </div>
                </div>
            <?php endif; endforeach; ?>
        </div>
    </div>

    <?php 

    if (isset($_GET['pokemon'])) {
        $selectedPokemon = getPokemonDetails("https://pokeapi.co/api/v2/pokemon/" . $_GET['pokemon']);
        include 'modal.php';
    }
    ?>
</body>
</html>