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
- `app/contact_support.php` — contacto de soporte
- `app/support_inbox.php` — bandeja de respuestas de soporte
- `claim_account.php` — reclamación de cuenta de empleado

Componentes:

- `components/simple_table.php` — tabla reutilizable con búsqueda y paginación client-side
- `components/modal_scan.php`, `components/modal_confirm.php`, `components/toasts.php`

Docs: ver la carpeta `docs/` para arquitectura y especificaciones de negocio.
- `docs/architecture.md`
- `docs/specifications.md`
- `docs/use_cases.md`

Notas:
- El sitio está orientado a un flujo de trámites y aprobaciones; las páginas archivadas en `archive/app/` son referencia histórica.
- Tailwind se genera localmente en `assets/css/tailwind.css` para evitar dependencias CDN.

Arrancar servidor PHP rápido:

```bash
php -S localhost:8000
```

Reconstruir CSS localmente con Tailwind:

```bash
npm install
npm run build:css
```

