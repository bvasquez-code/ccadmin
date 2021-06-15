<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-27 11:42:26 --> Cannot use object of type App\Models\CEN\CENVariacionProducto as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(316): App\Models\CLN\CLNPreventa->Validar_Stok_Disponible(Object(App\Models\CEN\CENCarrito), NULL, 4733, 8, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(89): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-10-27 11:42:37 --> Cannot use object of type App\Models\CEN\CENVariacionProducto as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(316): App\Models\CLN\CLNPreventa->Validar_Stok_Disponible(Object(App\Models\CEN\CENCarrito), NULL, 4733, 8, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(89): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-10-27 11:45:21 --> Cannot use object of type App\Models\CEN\CENVariacionProducto as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(316): App\Models\CLN\CLNPreventa->Validar_Stok_Disponible(Object(App\Models\CEN\CENCarrito), NULL, 4733, 7, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(89): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-10-27 11:47:02 --> Trying to get property 'Id_Variacion' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(660): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 660, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(316): App\Models\CLN\CLNPreventa->Validar_Stok_Disponible(Object(App\Models\CEN\CENCarrito), Array, 4733, 5, Array)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(89): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-10-27 20:21:53 --> You must set the database table to be used with your query.
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1190): CodeIgniter\Database\BaseConnection->table(NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1629): CodeIgniter\Model->builder()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNUsuario.php(43): CodeIgniter\Model->__get('session')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Usuario.php(35): App\Models\CLN\CLNUsuario->Render_Crear(16, Object(App\Models\CEN\CENAutenticacionService))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Usuario->crear(16)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
