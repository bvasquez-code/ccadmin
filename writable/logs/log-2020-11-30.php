<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-11-30 10:39:42 --> Argument 1 passed to App\Models\CLN\CLNCarrito::__construct() must be an instance of App\Models\CEN\CENAutenticacionService, array given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php on line 257
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(257): App\Models\CLN\CLNCarrito->__construct(Array, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Promocion()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-11-30 13:06:36 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 38, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
