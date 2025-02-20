🚗 Aplicación de Gestión de Carros (CRUD) con Laravel y Swagger
Esta es una aplicación web desarrollada en Laravel que permite realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre la entidad Carro. La aplicación incluye una interfaz web con Blade y una API RESTful documentada con Swagger.

📁 Características:
CRUD completo para la entidad Carro.
Interfaz de Usuario con Blade y Bootstrap.
API RESTful con respuestas JSON.
Documentación de API generada con Swagger (L5 Swagger).
Validaciones de formulario y mensajes de error.
Paginación, búsqueda y confirmación de eliminación con SweetAlert (Opcional).
🧰 Requisitos Previos:
PHP >= 8.1
Composer
Laravel >= 10
MySQL (o cualquier base de datos compatible con Laravel)
🚀 Instalación:
1. Clonar el Repositorio:
bash
Copy
Edit
git clone https://github.com/tuusuario/gestion-carros.git
cd gestion-carros
2. Instalar Dependencias:
bash
Copy
Edit
composer install
3. Configurar el Archivo .env:
bash
Copy
Edit
cp .env.example .env
php artisan key:generate
Configura la conexión a la base de datos en el archivo .env:

env
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carros_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
4. Ejecutar las Migraciones y Seeders:
bash
Copy
Edit
php artisan migrate --seed
5. Generar la Documentación de Swagger:
bash
Copy
Edit
php artisan l5-swagger:generate
6. Iniciar el Servidor de Desarrollo:
bash
Copy
Edit
php artisan serve
🌐 Cómo Acceder:
Aplicación Web: http://localhost:8000
Documentación de la API: http://localhost:8000/api/documentation
📚 EndPoints de la API:
🚗 Carros:
GET /api/carros — Obtener todos los carros.
GET /api/carros/{id} — Obtener un carro por ID.
POST /api/carros — Crear un nuevo carro.
PUT /api/carros/{id} — Actualizar un carro existente.
DELETE /api/carros/{id} — Eliminar un carro.
🛠️ Comandos Útiles:
📦 Instalar Dependencias:
bash
Copy
Edit
composer install
🔄 Actualizar Dependencias:
bash
Copy
Edit
composer update
🧹 Limpiar Caches:
bash
Copy
Edit
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
🔍 Comprobar Rutas Disponibles:
bash
Copy
Edit
php artisan route:list
🧪 Probar la API con cURL:
bash
Copy
Edit
curl -X POST http://localhost:8000/api/carros \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{"marca":"Toyota","modelo":"Corolla","año":2022,"color":"Rojo","precio":15000.00}'
👨‍💻 Herramientas Recomendadas:
Postman o Insomnia para probar la API.
PHPMyAdmin o Adminer para gestionar la base de datos.
VS Code con las extensiones de PHP y Laravel.
🚧 Posibles Errores:
🧠 Error: Class App\Http\Controllers\Carro not found
Asegúrate de importar correctamente la clase:

php
Copy
Edit
use App\Models\Carro;
🌐 Error: Route [carros.create] not defined
Revisa las rutas en web.php y ejecuta:

bash
Copy
Edit
php artisan route:clear
📄 Estructura del Proyecto:
pgsql
Copy
Edit
gestion-carros/
├─ app/
│   ├─ Http/
│   │   ├─ Controllers/
│   │   │   └─ CarroController.php
│   │   ├─ Requests/
│   │   │   └─ CarroRequest.php
│   └─ Models/
│       └─ Carro.php
├─ resources/
│   ├─ views/
│   │   ├─ carros/
│   │   │   ├─ index.blade.php
│   │   │   ├─ create.blade.php
│   │   │   ├─ edit.blade.php
│   │   │   └─ show.blade.php
│   │   └─ layouts/
│   │       └─ app.blade.php
├─ routes/
│   ├─ api.php
│   └─ web.php
└─ .env
💡 Consejo:
Si vas a utilizar la API y la interfaz web al mismo tiempo, puedes utilizar Postman para las pruebas de la API y el navegador para la aplicación web.

