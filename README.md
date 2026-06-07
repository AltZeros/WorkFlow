# WorkFlow

Prototype frontend para un Workflow Management System (WMS). Este repo contiene vistas PHP y componentes Tailwind que modelan un MVP de flujo operativo (inventario, recepciones, picking, packing) sin backend.

Rutas importantes:

- `index.php` — landing público
- `app/dashboard.php` — panel principal
- `app/flow_manager.php` — gestor de flujos (templates de proceso)
- `app/flow_editor.php` — editor de flujos
- `app/access_management.php` — directorio de usuarios y roles
- `app/inventory.php` — inventario (usa `mocks/items.json` si existe)
- `app/receiving.php` — recepciones (usa `mocks/pos.json` si existe)
- `app/picking.php` — picking (usa `mocks/orders.json`)
- `app/packing.php` — packing (usa `mocks/shipments.json`)
- `app/subscription.php` — suscripción y billing
- `app/organization.php` — configuración del tenant

Componentes:

- `components/simple_table.php` — tabla reutilizable con búsqueda y paginación client-side
- `components/modal_scan.php`, `components/modal_confirm.php`, `components/toasts.php`

Docs: ver la carpeta `docs/` para arquitectura y especificaciones de negocio.
- `docs/architecture.md`
- `docs/specifications.md`

Arrancar servidor PHP rápido:

```bash
php -S localhost:8000
```

