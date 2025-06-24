
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Validación</title>
    <style>
        .error { color: red; font-size: 0.9em; }
        label { display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <form id="miFormulario" novalidate>
        <label>
            Nombre:
            <input type="text" name="nombre" id="nombre" required>
            <div id="error-nombre" class="error"></div>
        </label>
        <label>
            Email:
            <input type="email" name="email" id="email" required>
            <div id="error-email" class="error"></div>
        </label>
        <label>
            Edad:
            <input type="number" name="edad" id="edad" min="18" max="99" required>
            <div id="error-edad" class="error"></div>
        </label>
        <button type="submit">Enviar</button>
    </form>
    <script>
        document.getElementById('miFormulario').addEventListener('submit', function(e) {
            let valido = true;

            // Limpiar errores previos
            document.getElementById('error-nombre').textContent = '';
            document.getElementById('error-email').textContent = '';
            document.getElementById('error-edad').textContent = '';

            // Validar nombre
            const nombre = document.getElementById('nombre').value.trim();
            if (nombre === '') {
                document.getElementById('error-nombre').textContent = 'El nombre es requerido.';
                valido = false;
            }

            // Validar email
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                document.getElementById('error-email').textContent = 'El email es requerido.';
                valido = false;
            } else if (!emailRegex.test(email)) {
                document.getElementById('error-email').textContent = 'El email no es válido.';
                valido = false;
            }

            // Validar edad
            const edad = parseInt(document.getElementById('edad').value, 10);
            if (isNaN(edad)) {
                document.getElementById('error-edad').textContent = 'La edad es requerida.';
                valido = false;
            } else if (edad < 18 || edad > 99) {
                document.getElementById('error-edad').textContent = 'La edad debe estar entre 18 y 99.';
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
