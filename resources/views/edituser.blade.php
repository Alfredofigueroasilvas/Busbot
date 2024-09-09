<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding-top:200px;
            text-align: center;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 2px solid #ccc;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
        }
        .form-group input[disabled] {
            background-color: #e0e0e0;
            color: #666;
        }
        .form-group input[type="file"] {
            padding: 5px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        .edit-button {
            margin-bottom: 15px;
            background-color: #007BFF;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Imagen circular de perfil -->
        <img src="https://via.placeholder.com/120" alt="Foto de Perfil" class="profile-pic" id="profilePicture">

        <h2>Editar Perfil</h2>

        <!-- Botón para habilitar la edición -->
        <div class="form-group">
            <button type="button" class="edit-button" id="editInfoBtn" onclick="enableEditing()">Editar información</button>
        </div>

        <form onsubmit="return saveChanges(event)">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="Carlos" disabled>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="Ramirez" disabled>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="1999-06-12" disabled>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="carlosuthti@gmail.com" disabled>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" value="password123" disabled>
            </div>
            <div class="form-group">
                <label for="profile_pic">Cambiar Foto de Perfil:</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="form-group">
                <button type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>

    <script>
        // Función para previsualizar la imagen seleccionada
        function previewImage(event) {
            const profilePicture = document.getElementById('profilePicture');
            const file = event.target.files[0];
            if (file) {
                profilePicture.src = URL.createObjectURL(file);
            }
        }

        // Función para habilitar la edición de los campos
        function enableEditing() {
            const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="date"]');
            inputs.forEach(input => input.disabled = false);
        }

        // Función para guardar los cambios
        function saveChanges(event) {
            event.preventDefault();
            const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="date"]');
            inputs.forEach(input => input.disabled = true);
            alert("Cambios guardados correctamente.");
        }
    </script>
</body>
</html>
