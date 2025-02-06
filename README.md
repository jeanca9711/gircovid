# Seguimiento de Casos COVID

## Descripción
Este proyecto es una aplicación web desarrollada con CodeIgniter y MySQL para el seguimiento de casos de COVID-19. Permite registrar, actualizar y monitorear casos de contagio, contactos cercanos y estados de salud de los pacientes, facilitando la toma de decisiones en entornos sanitarios y administrativos.

## Tecnologías Utilizadas
- **Backend:** CodeIgniter 3/4
- **Base de Datos:** MySQL Database
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Servidor Web:** Apache/Nginx
- **ORM:** Query Builder de CodeIgniter

## Características Principales
- Registro de pacientes infectados y sospechosos.
- Seguimiento del estado de salud de los pacientes.
- Relación de contactos cercanos para trazabilidad.
- Reportes y estadísticas sobre la evolución de los casos.
- Acceso seguro mediante autenticación de usuarios.

## Instalación
### Requisitos Previos
1. Tener instalado un servidor web (Apache o Nginx).
2. Instalar PHP (>=7.3 para CodeIgniter 4).
3. Tener configurada una base de datos MySQL.
4. Composer para gestionar dependencias.

### Pasos de Instalación
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/jeanca9711/gircovid.git
   cd gircovid
   ```
2. Instalar dependencias con Composer:
   ```bash
   composer install
   ```
3. Configurar el archivo `application/config/database.php` con las credenciales de Oracle.
4. Ejecutar migraciones de base de datos:
   ```bash
   php spark migrate
   ```
5. Configurar el servidor web y acceder a la aplicación.

## Uso
- Iniciar sesión con credenciales de usuario.
- Registrar nuevos casos COVID con la información del paciente.
- Actualizar estados de salud y contactos cercanos.
- Generar reportes y analizar tendencias.

## Contacto
Para consultas o soporte, contáctanos a [jeancarlosdpa01@gmail.com](mailto:jeancarlosdpa01@gmail.com).

