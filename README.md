# Busbot
Pasos para ejecutar correctamente la aplicación.

## 1. Clonar el Repositorio
#### Primero, clonar el repositorio
#### git clone https://github.com/Alfredofigueroasilvas/busbot.git

## 2. Navegar a la Carpeta del Repositorio
#### Después de clonar el repositorio, navegar a la carpeta del proyecto
#### cd busbot

# 3. Instalar Dependencias de Composer
#### Ejecutar el siguiente comando para instalar las dependencias del proyecto
#### composer install

# 4. Instalar Dependencias de Node.js
#### Ejecutar el siguiente comando para instalar las dependencias de JavaScript
#### npm install

# 5. Configurar el Archivo de Entorno
#### Copiar el archivo de entorno de ejemplo .env.example a un nuevo archivo .env
#### cp .env.example .env

# 6. Generar la Clave de la Aplicación
#### Ejecutar el siguiente comando para generar una nueva clave de aplicación Laravel
#### php artisan key:generate

# 7. Configurar el Archivo .env
#### Abrir el archivo .env y configurar las variables necesarias como la conexión a la base de datos.

# 8. Migrar la Base de Datos
#### Ejecutar las migraciones de la base de datos para crear las tablas necesarias
#### php artisan migrate

# 9. Compilar los Activos Frontend
#### Compilar los activos frontend con Laravel
#### npm run dev

# 10. Ejecutar el Servidor de Desarrollo
#### Ejecutar el servidor de desarrollo de Laravel
#### php artisan serve
#### Esto iniciará un servidor en http://localhost:8000 donde se podrá ver la aplicación en funcionamiento.

# 11. Acceder a la Aplicación
#### Abrir el navegador e ingresar a http://localhost:8000 para ver la aplicación en funcionamiento.

## Estructura del Flujo de Trabajo

### Ramas
- `main`: Rama principal que contiene el código de producción.
- `develop`: Rama para desarrollo, donde se integran los cambios de diferentes ramas de características.
- `feature/nombre-feature`: Ramas individuales para nuevas características o funcionalidades.
- `bugfix/nombre-bug`: Ramas individuales para corrección de errores.

### Pull Requests
- Las nuevas características y correcciones se desarrollan en ramas individuales.
- Una vez completados, se abre un pull request (PR) hacia `develop`.
- El PR debe ser revisado y aprobado por al menos un miembro del equipo antes de fusionarse.

### Integración Continua (CI)
- Usamos GitHub Actions para ejecutar pruebas automatizadas y análisis de código en cada push y PR.
- El archivo de configuración se encuentra en `.github/workflows/ci.yml`.

### Entrega Continua (CD)
- Las nuevas versiones se despliegan automáticamente cuando se fusiona código en la rama `main`.
- Los scripts de despliegue se encuentran en la carpeta `scripts/deploy`.

### Gestión de Proyectos
- Usamos GitHub Issues para rastrear errores y tareas.
- Los proyectos se gestionan con GitHub Projects usando la metodología Kanban.

### Documentación
- La documentación del proyecto se encuentra en el archivo `README.md`.
- Documentación adicional y detallada se encuentra en el wiki del repositorio.

### Contribución
- Por favor, revisa el archivo `CONTRIBUTING.md` para obtener directrices sobre cómo contribuir al proyecto.
- Todas las contribuciones deben pasar por un proceso de revisión de código.

### Seguridad
- Las ramas principales están protegidas para evitar fusiones directas sin revisiones.
- Usamos GitHub Advanced Security para escanear vulnerabilidades en el código y las dependencias.

