# Arquitectura y mapa de vistas

Páginas principales (frontend MVP):

- `index.php` — Landing público.
- `login.php` / `register.php` — Auth placeholders. `register.php` está diseñado como onboarding inicial del tenant, no como registro libre de empleados.
- `claim_account.php` — página de reclamación de cuenta para empleados invitados.
- `app/dashboard.php` — Resumen operativo.
- `app/flow_manager.php` — Gestor de flujos y plantillas de proceso.
- `app/flow_editor.php` — Editor de flujos y etapa por etapa.
- `app/access_management.php` — Directorio de usuarios y roles.
- `app/inventory.php` — Inventario (lista, detalle básico).
- `app/receiving.php` — Recepciones / POs.
- `app/picking.php` — Bandeja de picking.
- `app/packing.php` — Packing y envíos.
- `app/subscription.php` — Información de suscripción.
- `app/organization.php` — Configuración del tenant.

Componentes reutilizables:

- `components/simple_table.php` — tabla con búsqueda y paginación cliente.
- `components/modal_scan.php` — modal simulado para escaneo de códigos.
- `components/modal_confirm.php` — modal genérico de confirmación.
- `components/toasts.php` — notificaciones simples.
- `components/app_sidebar.php`, `components/app_navbar.php` — layout de la app.

Mocks:

- `mocks/items.json` — datos para inventario.
- `mocks/pos.json` — POs para recepciones.
- `mocks/orders.json` — órdenes para picking.
- `mocks/shipments.json` — envíos para packing.
- `mocks/flows.json` — plantillas de flujos.

Flujo principal (MVP):

1. Usuario logueado llega a `app/dashboard.php`.
2. Crea/consulta recepciones en `app/receiving.php`.
3. Recepciones generan tareas de put-away y entradas de inventario.
4. Órdenes aparecen en `app/picking.php` para ser preparadas.
5. Se generan paquetes en `app/packing.php` y se marcan como enviados.
