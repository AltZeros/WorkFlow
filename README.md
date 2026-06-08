# WorkFlow

Prototype frontend para un Workflow Management System (WFMS). Este repo contiene vistas PHP y componentes Tailwind que modelan un MVP de gestión de trámites, aprobaciones y flujos internos sin backend.

Rutas importantes:

- `index.php` — landing público
- `login.php` / `register.php` — auth y onboarding del tenant
- `app/dashboard.php` — panel principal
- `app/flow_manager.php` — gestor de flujos (templates de proceso)
- `app/flow_editor.php` — editor de flujos con soporte de subflujos enlazables
- `app/access_management.php` — directorio de usuarios y roles
- `app/my_procedures.php` — historial de solicitudes
- `app/new_application.php` — iniciar nuevo trámite
- `app/pending_tasks.php` — bandeja de aprobaciones
- `app/assessment.php` — evaluación de solicitudes
- `app/subscription.php` — suscripción y billing
- `app/organization.php` — configuración del tenant

Componentes:

- `components/simple_table.php` — tabla reutilizable con búsqueda y paginación client-side
- `components/modal_scan.php`, `components/modal_confirm.php`, `components/toasts.php`

Docs: ver la carpeta `docs/` para arquitectura y especificaciones de negocio.
- `docs/architecture.md`
- `docs/specifications.md`

Notas:
- Las páginas de inventario/recepciones/picking/packing se movieron a `archive/app/` tras el enfoque en el MVP de gestión de trámites.
- El contenido archivado se mantiene para referencia histórica, pero no forma parte de la navegación activa.

Arrancar servidor PHP rápido:

```bash
php -S localhost:8000
```

