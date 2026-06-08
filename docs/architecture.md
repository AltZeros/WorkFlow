# Arquitectura y mapa de vistas

Páginas principales (frontend MVP):

- `index.php` — Landing público.
- `login.php` / `register.php` — Auth placeholders. `register.php` está diseñado como onboarding inicial del tenant, no como registro libre de empleados.
- `claim_account.php` — página de reclamación de cuenta para empleados invitados.
- `app/dashboard.php` — Resumen operativo.
- `app/flow_manager.php` — Gestor de flujos y plantillas de proceso.
- `app/flow_editor.php` — Editor de flujos y etapa por etapa.
- `app/access_management.php` — Directorio de usuarios y roles.
- `app/subscription.php` — Información de suscripción.
- `app/organization.php` — Configuración del tenant.

Nota: las páginas históricas de operativa (`inventory.php`, `receiving.php`, `picking.php`, `packing.php`) se han movido a `archive/app/` para evitar confusiones con el flujo principal actual.

Componentes reutilizables:

- `components/simple_table.php` — tabla con búsqueda y paginación cliente.
- `components/modal_scan.php` — modal simulado para escaneo de códigos.
- `components/modal_confirm.php` — modal genérico de confirmación.
- `components/toasts.php` — notificaciones simples.
- `components/app_sidebar.php`, `components/app_navbar.php` — layout de la app.

Mocks:

- `mocks/flows.json` — plantillas de flujos.

Nota: los mocks de inventario/recepciones/picking/packing existen solo para las páginas archivadas en `archive/app/`.

Flujo principal (MVP):

1. Usuario logueado llega a `app/dashboard.php`.
2. Inicia un trámite en `app/new_application.php` y consulta su estado en `app/my_procedures.php`.
3. El supervisor revisa pendientes en `app/pending_tasks.php`.
4. El administrador ajusta flujos en `app/flow_manager.php` y roles en `app/access_management.php`.
5. La auditoría registra el historial de decisiones en `app/audit.php`.
