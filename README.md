# Pokémon Blog

Un blog interactivo de Pokémon construido con PHP y Tailwind CSS, que consume la API de Pokémon (PokéAPI) para mostrar información dinámica de Pokémon sin usar JavaScript. El proyecto incluye funcionalidades como cards de Pokémon, un modal con detalles, un sistema de "me gusta", ocultar/desocultar Pokémon y comentarios, todo almacenado en memoria usando sesiones.

## Características

- **Cards de Pokémon**: Muestra una lista de Pokémon con su nombre e imagen en tarjetas interactivas.
- **Modal con Detalles**: Al hacer clic en una card, se abre un modal con información detallada del Pokémon (tipo, habilidades, altura, peso).
- **Sistema de "Me Gusta"**: Permite dar "me gusta" a un Pokémon, con un ícono de corazón que cambia de estado (similar a Instagram).
- **Ocultar/Desocultar Pokémon**: Los usuarios pueden ocultar Pokémon de la lista y desocultarlos todos a la vez.
- **Comentarios**: Sección para agregar y mostrar comentarios sobre cada Pokémon, almacenados en memoria.
- **Diseño Responsive**: El blog se adapta a diferentes dispositivos (móviles, tablets, desktop) gracias a Tailwind CSS.
- **Límite de Pokémon**: Muestra un máximo de 6 Pokémon por defecto para una mejor experiencia de usuario.

## Requisitos

- **PHP 7.4+**: Necesario para ejecutar el proyecto.
- **Servidor Web**: Un servidor como XAMPP, WAMP o cualquier servidor con soporte para PHP.
- **Conexión a Internet**: Para consumir la PokéAPI.
- **Sesiones Habilitadas**: PHP debe tener soporte para sesiones activado.

## Instalación

1. **Clonar o Descargar el Proyecto**:
   - Descarga o clona este repositorio en tu máquina local.
   - Por ejemplo: `git clone <URL-del-repositorio>` (si usas Git).

2. **Colocar en un Servidor con PHP**:
   - Copia la carpeta del proyecto (por ejemplo, `proyecto-pokemon`) al directorio raíz de tu servidor web.
   - Si usas XAMPP, colócalo en `C:\xampp\htdocs\proyecto-pokemon`.

3. **Iniciar el Servidor**:
   - Inicia tu servidor web (por ejemplo, Apache en XAMPP).
   - Asegúrate de que PHP esté configurado correctamente y las sesiones estén habilitadas.

4. **Acceder al Proyecto**:
   - Abre tu navegador y accede a la URL del proyecto, por ejemplo: `http://localhost/proyecto-pokemon/index.php`.

## Uso

1. **Explorar Pokémon**:
   - La página principal (`index.php`) muestra una lista de 6 Pokémon en formato de tarjetas.
   - Cada tarjeta incluye el nombre y la imagen del Pokémon.

2. **Interacciones**:
   - **Me Gusta**: Haz clic en el ícono de corazón para dar "me gusta" a un Pokémon. Vuelve a hacer clic para quitarlo.
   - **Ocultar**: Haz clic en "Ocultar" para eliminar un Pokémon de la lista (permanece oculto durante la sesión).
   - **Desocultar**: Si hay Pokémon ocultados, aparecerá un botón "Mostrar Pokémon Ocultados" para restaurarlos todos.
   - **Detalles**: Haz clic en "Detalles" para abrir un modal con información adicional del Pokémon.

3. **Comentarios**:
   - En el modal de detalles, puedes agregar comentarios sobre el Pokémon.
   - Los comentarios se almacenan en memoria y se muestran debajo del formulario.



### Descripción de los Archivos

- **`index.php`**: Punto de entrada del proyecto. Muestra las cards de Pokémon, maneja los "me gusta", ocultar/desocultar y abre el modal.
- **`modal.php`**: Renderiza el modal con los detalles de un Pokémon seleccionado (tipo, habilidades, altura, peso) e incluye la sección de comentarios.
- **`comentarios.php`**: Maneja la lógica para agregar y mostrar comentarios, almacenados en memoria usando sesiones.
- **`README.md`**: Este archivo de documentación.

## Tecnologías Utilizadas

- **PHP**: Para la lógica del servidor, consumo de la API y manejo de sesiones.
- **PokéAPI**: API pública para obtener datos de Pokémon (https://pokeapi.co/).
- **Tailwind CSS**: Framework de CSS para un diseño moderno y responsive, incluido vía CDN.
- **Sesiones de PHP**: Para almacenar "me gusta", Pokémon ocultados y comentarios en memoria.

## Notas

- **Sin JavaScript**: Toda la lógica se implementa en PHP, cumpliendo con los requisitos del proyecto.
- **Almacenamiento en Memoria**: Los datos (likes, Pokémon ocultados, comentarios) se almacenan en sesiones y se pierden al cerrar el navegador.
- **Límite de Pokémon**: Por defecto, se muestran 6 Pokémon. Puedes cambiar este límite modificando el parámetro `$limit` en la función `getPokemonData()` en `index.php`.

## Posibles Mejoras

- Agregar paginación para mostrar más Pokémon.
- Implementar desocultar Pokémon individualmente en lugar de todos a la vez.
- Añadir validaciones más estrictas para los comentarios (por ejemplo, límite de caracteres).
- Personalizar más el diseño con Tailwind CSS (colores, animaciones, etc.).

