<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-20 00:35:16 --> A non-numeric value encountered
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(376): CodeIgniter\Debug\Exceptions->errorHandler(2, 'A non-numeric v...', 'C:\\xampp\\htdocs...', 376, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(108): App\Models\CLN\CLNPreventa->Validar_Stok_Disponible(Object(App\Models\CEN\CENItemproducto))
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-20 18:04:13 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(119): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 119, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-20 18:04:37 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Categoriaproducto.php(50): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 50, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('6')
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-20 20:49:41 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(119): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 119, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-20 20:49:49 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(119): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 119, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-20 22:35:00 --> Trying to get property 'Flg_Cargado' of non-object
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 38, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
