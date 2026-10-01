# 🎓 PortalU - Sistema de Registro de Aspirantes (Laboratorio 3)

Un sistema web desarrollado en **PHP** y **Bootstrap 5** para la gestión y validación del registro de aspirantes universitarios. El proyecto incluye procesamiento de datos en el servidor, validaciones de seguridad, carga de archivos multimedia y gestión de eliminación de registros.

## 🚀 Características Principales

* **Formulario de Registro Completo (`index.php`):** Captura de datos personales (Nombre, Apellido, Cédula/Identificación, Fecha de Nacimiento, Sexo y Fotografía).

* **Procesamiento y Validación en Servidor (`procesar.php`):**
  * **Saneamiento de Entradas:** Uso de `htmlspecialchars`, `strip_tags` y `trim` para prevenir inyecciones de código.
  * **Estandarización de Datos:** Conversión automática de nombres a formato tipo título (*Capitalize*) y cédula a mayúsculas.
  * **Cálculo de Edad:** Validación dinámica de edad estricta en el rango de **18 a 70 años**.
  * **Gestión Segura de Archivos:** Validación de extensiones permitidas (`png`, `jpg`, `jpeg`, `gif`, `webp`) y renombrado único mediante `uniqid()`.

* **Funcionalidad de Eliminación (`eliminar.php`):**
  * Opción para cancelar el registro y borrar físicamente la imagen almacenada en el servidor utilizando `unlink()`.
  * Verificación de seguridad para prevenir la eliminación arbitraria de archivos (*Path Traversal Defense*).

* **Diseño Responsivo e Interfaz Limpia:** Construido sobre **Bootstrap 5** con estructura modular de encabezado (`header.php`) y pie de página (`footer.php`).

## 📁 Estructura del Proyecto

```text
Taller-Aspirantes/
├── Includes/
│   ├── header.php          # Encabezado modular y navegación
│   └── footer.php          # Pie de página y scripts de Bootstrap
├── Uploaded_files/         # Carpeta de almacenamiento de fotografías
│   ├── .gitkeep            # Mantiene la carpeta en Git
│   └── .htaccess           # Protección de acceso
├── eliminar.php            # Lógica PHP para borrado de fotos y cancelación
├── index.php               # Formulario principal de registro
└── procesar.php            # Procesador backend, validaciones y tarjeta de éxito
```
## 🛠️ Tecnologías Utilizadas

Lenguaje Backend: PHP 8.x

Frontend: HTML5, CSS3, JavaScript

Framework CSS: Bootstrap 5

Entorno Servidor: WAMP Server / XAMPP / Apache

## ⚙️ Requisitos e Instalación
Clonar el repositorio:

Bash
   git clone https://github.com/jazidsanchez-create/Lab3_Taller-Aspirantes.git
   
Iniciar el Servidor Web (Apache):
Asegúrate de que Apache esté en ejecución (WAMP / XAMPP).

Ejecutar en el navegador:
Abre tu navegador e ingresa a:
http://localhost/Taller-Aspirantes/

## 📝 Notas de Desarrollo y Seguridad
Sin Base de Datos: Siguiendo las especificaciones del laboratorio, la persistencia se realiza mediante el manejo de archivos físicos en el servidor local.

Control de Excepciones: Se capturan fechas inválidas o ausentes sin interrumpir la ejecución del sistema.