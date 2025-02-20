
# 🚗 **Aplicación de Gestión de Carros (CRUD) con Laravel y Swagger**

Esta es una **aplicación web** desarrollada en **Laravel** que permite realizar operaciones **CRUD** (Crear, Leer, Actualizar, Eliminar) sobre la entidad **Carro**. La aplicación incluye una **interfaz web** con **Blade** y una **API RESTful** documentada con **Swagger**.

## 🧰 **Requisitos Previos:**

- **PHP >= 8.1**
- **Composer**
- **Laravel >= 10**
- **MySQL** (o cualquier base de datos compatible con Laravel)

## 🚀 **Instalación:**

### 1. **Clonar el Repositorio:**
```bash
git clone https://github.com/yilveru/ml-laravel-carros.git
cd ml-laravel-carros
```

### 2. **Instalar Dependencias:**
```bash
composer install
```

### 3. **Configurar el Archivo `.env`:**
```bash
cp .env.example .env
php artisan key:generate
```

Configura la conexión a la base de datos en el archivo **`.env`**:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carros_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 4. **Ejecutar las Migraciones y Seeders:**
```bash
php artisan migrate --seed
```

### 5. **Generar la Documentación de Swagger:**
```bash
php artisan l5-swagger:generate
```

### 6. **Iniciar el Servidor de Desarrollo:**
```bash
php artisan serve
```

## 🌐 **Cómo Acceder:**

- **Aplicación Web:** [http://localhost:8000](http://localhost:8000)
- **Documentación de la API:** [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
