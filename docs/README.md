# Documentación - WorkFlow (Frontend MVP)

Bienvenido a la documentación del prototipo frontend de WorkFlow. Aquí se describe la estructura del proyecto, las vistas principales del MVP WMS y cómo trabajar con los mocks.

- Estructura principal: ver `docs/architecture.md`.
- Especificaciones de negocio y flujo: ver `docs/specifications.md`.
- Mocks: la carpeta `mocks/` contiene JSON (items, pos, orders, shipments, flows) que las páginas consumen si existen.
- Componentes reutilizables: `components/simple_table.php`, `components/modal_scan.php`, `components/modal_confirm.php`, `components/toasts.php`.

Cómo usar localmente:

1. Servidor PHP integrado (desde la raíz del proyecto):

```bash
php -S localhost:8000
```

2. Abrir en el navegador `http://localhost:8000/index.php` y luego iniciar sesión o navegar a `app/dashboard.php`.

3. Para probar páginas WMS ir a `app/inventory.php`, `app/receiving.php`, `app/picking.php`, `app/packing.php`.
