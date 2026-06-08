# Casos de Uso del MVP WorkFlow

## Introducción
Este documento describe los casos de uso principales del sistema de gestión de trámites y procesos WorkFlow. Se simula la experiencia desde la landing pública (`index.php`) y se explica cómo interactúan los roles clave: empleado, supervisor y administrador.

> Nota: en este prototipo, `register.php` representa la creación del tenant y del primer administrador. Para un SaaS real, los empleados del tenant deberían agregarse o reclamar cuentas desde el tenant owner, no registrarse libremente desde la landing.

---

## Caso de uso 1: Empleado inicia un trámite

### Precondición
- El empleado ya debe haber reclamado su cuenta tras la invitación del tenant.

### Actor
- Empleado / solicitante

### Objetivo
- Iniciar un nuevo trámite y dar seguimiento a su estado.

### Flujo principal
1. El usuario llega a `index.php`.
2. Selecciona `Iniciar sesión` o `Registrarse`.
3. Al autenticarse, ingresa al panel de usuario.
4. Desde el sidebar accede a `Iniciar Trámite`.
5. Completa el formulario en `app/new_application.php` con datos del trámite.
6. Envía la solicitud.
7. El trámite aparece en `Mis Solicitudes` (`app/my_procedures.php`).
8. El usuario revisa el estado y recibe notificaciones si el trámite avanza.

### Resultado esperado
- Se crea un nuevo trámite en el sistema.
- El solicitante puede ver su historial y estado.
- El trámite queda asignado a la bandeja de pendientes del supervisor.

---

## Caso de uso 2: Supervisor revisa y aprueba una solicitud

### Actor
- Supervisor / gestor de aprobaciones

### Objetivo
- Revisar trámites pendientes y tomar una decisión.

### Flujo principal
1. El supervisor inicia sesión desde `index.php`.
2. En el panel, selecciona `Bandeja de Pendientes`.
3. Encuentra el trámite enviado por el empleado.
4. Revisa detalles y documentación.
5. Aprueba o rechaza la solicitud.
6. El estado se actualiza y el empleado recibe notificación.
7. Si el supervisor necesita ver auditoría, puede abrir `Auditoría`.

### Resultado esperado
- El trámite cambia de estado (aprobado/rechazado).
- Queda trazabilidad en `Auditoría`.
- El solicitante ve la actualización en `Mis Solicitudes`.

---

## Caso de uso 3: Administrador configura flujos y usuarios

### Actor
- Administrador / tenant owner

### Objetivo
- Definir los flujos de aprobación y gestionar acceso de usuarios.

### Flujo principal
1. El administrador ingresa desde `index.php`.
2. Accede a `Dashboard General` para ver métricas.
3. Va a `Gestor de Flujos` para crear o editar un flujo de aprobación.
4. Configura etapas, aprobadores y reglas básicas.
5. Guarda el flujo y lo publica.
6. En `Directorio de Usuarios` asigna roles a nuevos empleados y supervisores.
7. Si es necesario, revisa `Organización` y `Suscripción`.

### Resultado esperado
- Existen flujos configurados para los trámites.
- Los usuarios tienen roles adecuados.
- La suscripción y parámetros de tenant están alineados con el plan.

---

## Caso de uso 4: Administrador revisa la operación del tenant

### Actor
- Administrador / tenant owner

### Objetivo
- Ver métricas, estado del tenant y revisar configuración de negocio.

### Flujo principal
1. Inicia sesión desde la landing.
2. Accede a `Dashboard General` para revisar actividad reciente.
3. Navega a `Gestor de Flujos` para verificar las plantillas de aprobación.
4. Ajusta roles y permisos en `Directorio de Usuarios`.
5. Revisa suscripción y organización desde `Organización` y `Suscripción`.

### Resultado esperado
- El tenant está configurado y los flujos son consistentes.
- El administrador puede responder a cambios de negocio y supervisar el uso.

---

## Observaciones generales
- `index.php` sirve como punto de entrada público: login, registro y acceso inicial.
- El sidebar debe mostrar primero el tablero y las acciones más comunes del usuario.
- Las funciones de administrador deben agruparse juntas y separarse de las tareas operativas y de aprobación.
- El sistema es un MVP; en este prototipo la persistencia se maneja con archivos JSON en `mocks/`.

---

## Recomendación de navegación
1. Landing / login
2. Dashboard general
3. Mis Solicitudes / Iniciar Trámite
4. Bandeja de Pendientes / Auditoría
5. Gestor de Flujos / Directorio de Usuarios / Organización / Suscripción
7. Soporte
