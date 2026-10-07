# Universidad Tecnológica de Panamá
## Facultad de Ingeniería de Sistemas Computacionales
**Campus Víctor Levis Sasso**  
**Laboratorio:** DESARROLLO WEB SUBIR ARCHIVOS (Taller Aspirantes)  
**Fecha de Ejecución:** 7 de Octubre de 2026  

---

## 🎯 Objetivos

* Comprender la importancia de la documentación en proyectos de desarrollo web[cite: 4].
* Implementar un formulario web interactivo en PHP para la carga y gestión de archivos/imágenes[cite: 1, 4].
* Consolidar el uso de buenas prácticas de seguridad (sanitización de datos con `htmlspecialchars` y validación de campos/extensiones).
* Aplicar una estructura modular con hojas de estilo, pie de página, encabezado y navegación estandarizada.

---

## 📝 Introducción

En este laboratorio se desarrolló un sistema de registro para aspirantes (`PortalU`) utilizando PHP, HTML, CSS y Apache. El objetivo principal consiste en permitir la recolección de datos del aspirante junto con la carga segura de su fotografía de perfil a un servidor local.

Durante el desarrollo del laboratorio, se estructuraron las vistas separando los componentes comunes (encabezados y pies de página), se implementaron validaciones de archivos en el lado del servidor y se configuraron políticas de seguridad para el almacenamiento en disco.

---

## ⚙️ Requisitos Previos

Para la ejecución y despliegue del proyecto se requiere contar con el siguiente entorno de desarrollo:

### Tecnologías utilizadas
* 🐘 **PHP:** 8.0 o superior
* 🌐 **Servidor Web:** Apache (XAMPP / WampServer)
* 🎨 **Frontend:** HTML5, CSS3, JavaScript
* 💻 **Editor de Código:** Visual Studio Code
* 🗂️ **Control de Versiones:** Git & GitHub

### 🖥️ Sistema Operativo
* Windows 10 / 11 / Linux / macOS

---

## 🔧 Instalación y Configuración del Proyecto

A continuación, se describe el procedimiento para clonar y ejecutar el laboratorio localmente:

### 1. Clonar el repositorio
Ubícate en el directorio raíz de tu servidor web (por ejemplo `htdocs` en XAMPP) y ejecuta:
bash
git clone [https://github.com/jazidsanchez-create/Lab3_Taller-Aspirantes.git](https://github.com/jazidsanchez-create/Lab3_Taller-Aspirantes.git)
cd Lab3_Taller-Aspirantes

## 2. Configurar el entorno de servidor
Inicia los servicios de Apache desde tu panel de control de XAMPP / WampServer.
Asegúrate de que la carpeta Uploaded_files/ tenga permisos de escritura habilitados para la subida de archivos.  

## 3. Acceder a la aplicación
Abre tu navegador e ingresa a la siguiente URL:
http://localhost/Lab3_Taller-Aspirantes/index.php

## 🏗️ Estructura del Proyecto y Controles Utilizados
El proyecto cuenta con la siguiente arquitectura modular de archivos:
Taller-Aspirantes/
├── Includes/
│   ├── header.php      # Encabezado principal y navegación
│   └── footer.php      # Pie de página unificado
├── Uploaded_files/
│   ├── .htaccess       # Políticas de seguridad del directorio de carga
│   └── .gitkeep
├── index.php           # Formulario principal de Registro de Aspirantes
├── procesar.php        # Lógica del servidor (validaciones y carga de archivos)
├── eliminar.php        # Acción para remover imágenes subidas
└── README.md           # Documentación general del laboratorio
## Controles Utilizados
index.php: Formulario HTML con atributo enctype="multipart/form-data" para el procesamiento de archivos. 

procesar.php: Script encargado de la verificación de campos no vacíos, sanitización mediante htmlspecialchars(), validación de extensiones permitidas (.jpeg, .jpg, .png, .gif, .webp) y almacenamiento con move_uploaded_file()[cite: 1, 3, 10].

Includes/header.php y footer.php: Módulos para estandarizar la interfaz y la navegación general de la plataforma.   

## 🖼️ Evidencia e Ilustración del Proyecto
  ## 1. Formulario de Registro de Aspirantes (Entrada)
Muestra la interfaz principal con los campos requeridos y la selección de la fotografía[cite: 1, 3]:

  ## 2. Procesamiento de Datos y Registro Exitoso (Salida / Evidencia de Acciones)
Muestra la confirmación del registro, los datos procesados, la ruta donde se guardó la foto generada y el botón para eliminar o registrar a otro aspirante[cite: 1, 4, 10]:

## ⚠️ Dificultades y Soluciones
Problema: Error al procesar la carga de la imagen por restricciones en el tipo de contenido.
     Solución: Se implementó una verificación estricta de extensiones permitidas (.png, .jpg, .jpeg, .gif, .webp) en procesar.php antes de mover la imagen a la carpeta Uploaded_files/[cite: 1].
     Problema: Inconsistencia en la codificación de caracteres especiales al desplegar respuestas del servidor.
      Solución: Se aplicó htmlspecialchars() a todas las cadenas capturadas por $_POST para prevenir ataques XSS y asegurar la correcta visualización del texto[cite: 1].

### 🌐 Tecnologías utilizadas

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Apache](https://img.shields.io/badge/APACHE-D22128?style=for-the-badge&logo=apache&logoColor=white)
![Wampserver](https://img.shields.io/badge/WAMPSERVER-005A9C?style=for-the-badge&logo=wampserver&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![VS Code](https://img.shields.io/badge/VS%20Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white)
![Git](https://img.shields.io/badge/GIT-F05032?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/GITHUB-181717?style=for-the-badge&logo=github&logoColor=white)

## 📚 Referencias
PHP Documentation Index. (2026). PHP Manual: Handling file uploads. https://www.php.net/manual/en/features.file-upload.php

W3Schools. (2026). PHP Form Handling and Security. https://www.w3schools.com/php/php_forms.asp

## 👤 Información del Autor
Estudiante: Jazid Sánchez

Institución: Universidad Tecnológica de Panamá

Facultad: Facultad de Ingeniería de Sistemas Computacionales

Carrera: Licenciatura en Ciberseguridad

Instructor: Ing. Irina Fong[cite: 1]