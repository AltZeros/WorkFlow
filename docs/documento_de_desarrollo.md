# Documento de desarrollo

## Identificación del proyecto

- Nombre del proyecto: WorkFlow
- Tipo: prototipo frontend de sistema de gestión de trámites y flujos internos (WFMS)
- Alcance: MVP de una aplicación SaaS de administración de procesos, gestión de usuarios y aprobaciones sin backend real.

## Objetivo del documento

Este documento describe el desarrollo del prototipo WorkFlow desde la perspectiva del usuario, los módulos principales, el flujo funcional y los elementos que componen la experiencia de uso.

## Contexto del proyecto

WorkFlow es un prototipo orientado a empresas que requieren digitalizar solicitudes internas, aprobaciones y trazabilidad de procesos. El proyecto modela un entorno SaaS donde diferentes roles interactúan con formularios, bandejas, flujos de trabajo y paneles de administración.

## Flujo de usuario principal

1. El usuario llega a la landing pública (`index.php`) y decide iniciar sesión o registrarse.
2. Si usa la aplicación como tenant owner, completa el onboarding en `register.php`.
3. El usuario autenticado accede al panel principal (`app/dashboard.php`).
4. Dependiendo de su rol:
   - El solicitante/empleado inicia trámites desde `app/new_application.php`.
   - El solicitante consulta el estado de sus solicitudes en `app/my_procedures.php`.
   - El supervisor revisa la bandeja de pendientes en `app/pending_tasks.php` y abre detalles en `app/assessment.php`.
   - El administrador configura flujos en `app/flow_manager.php` y edita etapas en `app/flow_editor.php`.
   - El administrador gestiona usuarios en `app/access_management.php`.
   - El administrador revisa la suscripción y la organización en `app/subscription.php` y `app/organization.php`.
5. El usuario puede solicitar ayuda desde `app/contact_support.php` y revisar la bandeja de soporte en `app/support_inbox.php`.

## Módulos principales del prototipo

### 1. Dashboard general

- Vista de entrada del usuario autenticado.
- Resume métricas clave, actividad reciente y accesos rápidos a los módulos principales.

### 2. Gestión de flujos

- `app/flow_manager.php`: lista de flujos existentes y acciones para editar o crear nuevos.
- `app/flow_editor.php`: editor de flujos con etapas, condiciones y enlaces a subflujos.

### 3. Solicitudes y procedimientos

- `app/new_application.php`: formulario para iniciar un nuevo trámite.
- `app/my_procedures.php`: historial y seguimiento de solicitudes propias.
- `app/procedure_details.php`: vista de detalle de cada trámite.

### 4. Aprobaciones y evaluación

- `app/pending_tasks.php`: bandeja de solicitudes pendientes para supervisores.
- `app/assessment.php`: formulario y detalles para aprobar o rechazar solicitudes.

### 5. Administración de usuarios y tenant

- `app/access_management.php`: directorio de usuarios, roles y permisos.
- `app/organization.php`: configuración del tenant y datos de la empresa.
- `app/subscription.php`: información sobre planes y facturación.

### 6. Soporte interno

- `app/contact_support.php`: formulario de contacto interno.
- `app/support_inbox.php`: bandeja de respuestas y mensajes de soporte.

## Arquitectura de navegación

- El componente `components/app_sidebar.php` define la navegación principal de la aplicación.
- El `app/dashboard.php` actúa como punto de entrada para los usuarios con acceso.
- Las páginas secundarias (`assessment.php`, `procedure_details.php`, `flow_editor.php`) se acceden desde las vistas principales y no forman parte del menú persistente.

## Flujo de implementación

- El prototipo está construido con PHP y Tailwind CSS local.
- Se usan componentes reutilizables para sidebar, navbar, modales y tablas.
- Los estilos se generan en `assets/css/tailwind.css` mediante Tailwind CLI.
- No hay persistencia real: los datos se modelan con arrays y vistas simuladas.

## Consideraciones de desarrollo

- Mantener la experiencia móvil con sidebar responsivo y overlay.
- Priorizar la claridad del flujo: inicio de trámite, revisión, aprobación y auditoría.
- Separar las funciones de administrador de las funciones operativas.
- Documentar cada módulo en `docs/` para facilitar la entrega académica.

## Notas finales

Este documento está diseñado para que el desarrollo se enfoque en los flujos de usuario y los módulos clave del MVP. La empresa provee el marco de trabajo y la estructura general, mientras que la implementación actual mantiene la lógica en el frontend y las rutas del prototipo.
