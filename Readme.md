# Soarco

Soarco es un sistema de gestión de proyectos inmobiliarios para una constructora/inmobiliaria. Permite administrar propiedades, agregar o eliminar proyectos, y cuenta con secciones como servicios, formulario de contacto, PQRSF y "Nosotros".

## Requisitos

### Backend
- PHP 8.3.6
- Dependencias de PHP (instaladas con Composer):
  - `intervention/image` ^3.11
  - `phpmailer/phpmailer` ^6.9
  - `vlucas/phpdotenv` ^5.6

### Frontend / Desarrollo
- Node.js
- Dependencias de desarrollo:
  - `gulp` ^4.0.2
  - `bootstrap` ^5.3.3
  - `sass` ^1.83.1
  - Otras dependencias de Gulp y PostCSS (ver `package.json`)

## Instalación

1. Clonar el repositorio:
   ```sh
   git clone https://github.com/usuario/soarco.git
   cd soarco
   ```
2. Instalar las dependencias de PHP:
   ```sh
   composer install
   ```
3. Configurar las variables de entorno:
   - Copiar el archivo `.env.example` y renombrarlo a `.env`
   - Ajustar las configuraciones según el entorno
4. Instalar las dependencias de Node.js:
   ```sh
   npm install
   ```
5. Compilar los archivos estáticos con Gulp:
   - Para desarrollo:
     ```sh
     gulp
     ```
   - Para producción (CSS minimizado y optimizado):
     ```sh
     gulp buildcss
     ```
6. Iniciar el servidor PHP:
   ```sh
   php -S localhost:3000 -t public
   ```
   Luego, acceder a `http://localhost:3000` desde el navegador.

## Estructura del Proyecto

```
C:.
+---controllers
+---includes
¦   +---config
¦   +---templates
+---models
+---public
¦   +---build
¦   ¦   +---css
¦   ¦   +---img
¦   ¦   +---js
¦   +---uploads
¦   ¦   +---images
¦   +---video
+---src
¦   +---img
¦   +---js
¦   +---scss
¦       +---internas
¦       +---layout
¦       +---utils
+---video
+---views
    +---auth
    +---comentarios
    +---equipo
    +---paginas
    +---proyectos
```

## Contribuciones
Este proyecto es de uso privado para la empresa constructora/inmobiliaria. No se aceptan contribuciones externas en este momento.

## Licencia
El código de este proyecto es propiedad del desarrollador, mientras que su uso y derechos de explotación pertenecen a la empresa. No está permitida su distribución o modificación sin autorización.

---

Si necesitas algún ajuste o quieres añadir más detalles, dime y lo modificamos. 🚀

