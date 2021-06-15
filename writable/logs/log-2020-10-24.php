<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-24 22:47:43 --> Undefined offset: 4733
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(579): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'D:\\WIN_INSTALAD...', 579, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(304): App\Models\CLN\CLNPreventa->Validar_Stok_Disponible(Object(App\Models\CEN\CENCarrito), NULL, 4733, 5)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(89): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
