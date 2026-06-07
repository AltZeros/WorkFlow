# Especificaciones del MVP SaaS WorkFlow

## Resumen del producto
WorkFlow es un prototipo de sistema de gestión de trámites y procesos (WMS) orientado a empresas que necesitan digitalizar aprobaciones, recepciones y operaciones internas. Está diseñado como SaaS con múltiples tenants, roles y paneles independientes.

## Modelo de negocio
- **SaaS multi-tenant**: cada cliente opera en su propio espacio con configuración, usuarios y datos separados.
- **Usuarios con roles**: solicitante, supervisor, administrador/tenant owner.
- **Suscripción**: pagos recurrentes por plan, con límites y características escalables.
- **Planes**:
  - WorkFlow Free: máximo de usuarios, flujos y trámites básicos.
  - WorkFlow Pro: usuarios ilimitados, flujos ilimitados, auditoría y soporte prioritario.
- **Retorno de inversión**: reduce el ciclo de aprobación, elimina papel y acelera entregas.

## Propuesta de valor
1. Centralizar solicitudes y aprobaciones en un solo panel.
2. Facilitar seguimiento y trazabilidad de cada trámite.
3. Agilizar picking, recepciones y envíos con flujos configurables.
4. Permitir a operaciones y finanzas trabajar con eventos auditables.

## Roles y permisos
- **Administrador**: configura flujos, usuarios, organización y suscripción.
- **Supervisor**: aprueba trámites, revisa bandeja de pendientes y gestiona tareas.
- **Solicitante / Empleado**: inicia solicitudes, consulta estado y sube documentación.
- **Usuario operativo**: accede a inventario, picking, packing, y recepciones según permisos.

## Flujo de usuario principal
1. Usuario llega a la landing pública (`index.php`) y se registra o inicia sesión.
2. Accede al panel (`app/dashboard.php`) con métricas y accesos directos.
3. Si es empleado, usa `app/new_application.php` para iniciar un trámite y revisa `app/my_procedures.php`.
4. Si es supervisor, usa `app/pending_tasks.php` para aprobar y `app/assessment.php` para evaluar.
5. Si es administrador/operations, gestiona flujos con `app/flow_manager.php`, usuarios con `app/access_management.php` y tenant con `app/organization.php`.
6. El equipo operativo usa `app/inventory.php`, `app/receiving.php`, `app/picking.php` y `app/packing.php` para operaciones WMS.

## Módulos del MVP
- Landing público y auth (login/register).
- Dashboard de métricas y actividad.
- Gestión de usuarios y roles.
- Diseño y edición de flujos de aprobación.
- Gestor de solicitudes y bandeja de pendientes.
- Inventario y operativa WMS básica.
- Recepciones, picking y packing.
- Auditoría y trazabilidad.
- Configuración de organización y suscripción.

## Planes y límites sugeridos
- **Free**:
  - Hasta 8 usuarios.
  - Hasta 3 flujos activos.
  - Hasta 100 trámites/mes.
  - Sin soporte prioritario.
- **Pro**:
  - Usuarios ilimitados.
  - Flujos ilimitados.
  - Trámites ilimitados.
  - Auditoría completa.
  - Soporte 24/7.

## Siguientes mejoras
- API REST para datos y persistencia.
- Guardado real de flujos y versiones.
- Control de permisos granular por flujo.
- Soporte multi-tenant real por subdominio.
- Flujos condicionales y automatizaciones.
- Dashboard de costos/uso por tenant.
