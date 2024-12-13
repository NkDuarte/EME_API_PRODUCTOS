# 📦 API RESTful de Gestión de Productos

Este proyecto es una API RESTful desarrollada con Laravel para la gestión de productos. Utiliza Laravel Passport para autenticación mediante Bearer Token y cuenta con un módulo de pruebas automatizadas para garantizar la funcionalidad del CRUD de productos.

---

## ✨ Características Principales

- API RESTful para gestionar productos.
- Autenticación segura con Laravel Passport.
- CRUD completo para el módulo de productos.
- Pruebas automatizadas para garantizar la calidad del código.
- Documentación de endpoints disponible en Postman.

---

## 📂 Estructura del Proyecto

```plaintext
project/
├── app/                # Código principal de la aplicación
│   ├── Http/
│   │   ├── Controllers/    # Controladores de la API
│   │   ├── Middleware/     # Middleware para autenticación y otros
│   └── Models/             # Modelos Eloquent
├── config/             # Configuración global de la aplicación
├── database/           # Migraciones y factories
├── public/             # Archivos públicos
├── routes/             # Definición de rutas API
│   └── api.php         # Rutas específicas para la API
├── tests/              # Pruebas automatizadas
│   └── Feature/        # Pruebas funcionales
└── ...
```

---

## 🚀 Instalación

### Requisitos

- PHP >= 8.0
- MySQL
- Composer
- Servidor local (XAMPP, Laragon, etc.)

### Pasos

1. **Clonar el repositorio**:
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd project/
   ```
2. **Instalar dependencias**:
   ```bash
   composer install
   ```
3. **Configurar el entorno**:
   Copiar el archivo `.env.example` a `.env` y modificar las credenciales de la base de datos:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Configurar la base de datos**:
   Crear una base de datos llamada `eme_products` y ejecutar las migraciones:
   ```bash
   php artisan migrate
   ```
5. **Instalar Passport**:
   ```bash
   php artisan passport:install
   ```
6. **Iniciar el servidor**:
   ```bash
   php artisan serve
   ```
   Accede en el navegador a `http://localhost:8000`.

---

## 📋 Endpoints de la API

La API cuenta con los siguientes endpoints:

|--------|-----------------------|-----------------------------|
| Método | Ruta                  | Descripción                 |
|--------|-----------------------|-----------------------------|
| GET    | `/api/products`       | Listar todos los productos. |
| POST   | `/api/products`       | Crear un nuevo producto.    |
| GET    | `/api/products/{id}`  | Mostrar un producto.        |
| PUT    | `/api/products/{id}`  | Actualizar un producto.     |
| DELETE | `/api/products/{id}`  | Eliminar un producto.       |
|--------|-----------------------|-----------------------------|
| POST   | `/api/register`       | Registrar un nuevo usuario. |
| POST   | `/api/login`          | Iniciar Sesion con usuario. |
|--------|-----------------------|-----------------------------|

> **Nota**: Todos los endpoints de **products** están protegidos por autenticación mediante Bearer Token.

Documentación completa en Postman: [Documentación Postman](https://documenter.getpostman.com/view/14362863/2sAYHxoQEk)

---

## 🛠️ Tecnologías Utilizadas

- **Framework**: Laravel 11
- **Autenticación**: Laravel Passport
- **Base de datos**: MySQL
- **Pruebas**: PHPUnit

---

## 🧪 Pruebas Automatizadas

El proyecto incluye pruebas automatizadas para el módulo de productos. Estas pruebas verifican:

1. Creación de productos.
2. Listado de productos.
3. Actualización de productos.
4. Eliminación de productos.

Ejecutar pruebas:
```bash
php artisan test
```

---

## 🤝 Contribuciones

¡Contribuciones son bienvenidas! Abre un issue o envía un pull request con mejoras o sugerencias.

---

## 🧑‍💻 Autor

**Nicolás Duarte Moreno**  
```
 ███▄    █  ██ ▄█▀
 ██ ▀█   █  ██▄█▒ 
▓██  ▀█ ██▒▓███▄░ 
▓██▒  ▐▌██▒▓██ █▄ 
▒██░   ▓██░▒██▒ █▄
░ ▒░   ▒ ▒ ▒ ▒▒ ▓▒
░ ░░   ░ ▒░░ ░▒ ▒░
   ░   ░ ░ ░ ░░ ░ 
         ░ ░  ░   
```