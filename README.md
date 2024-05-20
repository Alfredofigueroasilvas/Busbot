# Busbot
Prueba de concepto de Laravel con codespaces para tener codebase

# Enlace del Repositorio
Este es el enlace al repositorio en GitHub:
[(https://github.com/Alfredofigueroasilvas/Busbot)](https://github.com/Alfredofigueroasilvas/Busbot))

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

