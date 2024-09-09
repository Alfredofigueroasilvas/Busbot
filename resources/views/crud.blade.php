<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }
        button {
            cursor: pointer;
            border: none;
            color: #fff;
        }
        .add-button {
            background-color: #4CAF50;
        }
        .update-button {
            background-color: #2196F3;
        }
        .delete-button {
            background-color: #f44336;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-buttons button {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Usuarios</h1>

        <!-- Formulario para agregar/actualizar usuario -->
        <form id="userForm">
            <input type="hidden" id="userId">
            <input type="text" id="userName" placeholder="Nombre" required>
            <input type="text" id="userEmail" placeholder="Correo electrónico" required>
            <button type="submit" class="add-button">Agregar Usuario</button>
            <button type="button" class="update-button" id="updateButton" style="display: none;">Actualizar Usuario</button>
        </form>

        <!-- Tabla para mostrar usuarios -->
        <table id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        // Cargar usuarios desde localStorage
        document.addEventListener('DOMContentLoaded', function() {
            if (!localStorage.getItem('users')) {
                // Cargar usuarios de ejemplo si no hay usuarios en localStorage
                const initialUsers = [
                    { id: '1', name: 'Ana García', email: 'ana.garcia@example.com' },
                    { id: '2', name: 'Luis Fernández', email: 'luis.fernandez@example.com' },
                    { id: '3', name: 'Maria Pérez', email: 'maria.perez@example.com' },
                    { id: '4', name: 'Pedro López', email: 'pedro.lopez@example.com' },
                    { id: '5', name: 'Laura Martínez', email: 'laura.martinez@example.com' },
                    { id: '6', name: 'Carlos Sánchez', email: 'carlos.sanchez@example.com' },
                    { id: '7', name: 'Paola Ramírez', email: 'paola.ramirez@example.com' },
                    { id: '8', name: 'Javier Gómez', email: 'javier.gomez@example.com' },
                    { id: '9', name: 'Sofía Morales', email: 'sofia.morales@example.com' },
                    { id: '10', name: 'Juan Torres', email: 'juan.torres@example.com' }
                ];
                localStorage.setItem('users', JSON.stringify(initialUsers));
            }
            loadUsers();
        });

        // Agregar o actualizar usuario
        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const userId = document.getElementById('userId').value;
            const userName = document.getElementById('userName').value;
            const userEmail = document.getElementById('userEmail').value;

            const users = JSON.parse(localStorage.getItem('users')) || [];

            if (userId) {
                // Actualizar usuario
                const userIndex = users.findIndex(user => user.id === userId);
                if (userIndex !== -1) {
                    users[userIndex] = { id: userId, name: userName, email: userEmail };
                    localStorage.setItem('users', JSON.stringify(users));
                }
            } else {
                // Agregar usuario
                const newUser = {
                    id: Date.now().toString(),
                    name: userName,
                    email: userEmail
                };
                users.push(newUser);
                localStorage.setItem('users', JSON.stringify(users));
            }

            document.getElementById('userForm').reset();
            document.getElementById('updateButton').style.display = 'none';
            loadUsers();
        });

        // Cargar usuarios en la tabla
        function loadUsers() {
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const tableBody = document.getElementById('userTable').querySelector('tbody');
            tableBody.innerHTML = '';

            users.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td class="action-buttons">
                        <button class="update-button" onclick="editUser('${user.id}')">Editar</button>
                        <button class="delete-button" onclick="deleteUser('${user.id}')">Eliminar</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Editar usuario
        function editUser(userId) {
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users.find(user => user.id === userId);

            if (user) {
                document.getElementById('userId').value = user.id;
                document.getElementById('userName').value = user.name;
                document.getElementById('userEmail').value = user.email;
                document.getElementById('updateButton').style.display = 'inline-block';
            }
        }

        // Eliminar usuario
        function deleteUser(userId) {
            let users = JSON.parse(localStorage.getItem('users')) || [];
            users = users.filter(user => user.id !== userId);
            localStorage.setItem('users', JSON.stringify(users));
            loadUsers();
        }
    </script>
</body>
</html>
