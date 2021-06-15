<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-11 17:44:00 --> You must set the database table to be used with your query.
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1190): CodeIgniter\Database\BaseConnection->table(NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1629): CodeIgniter\Model->builder()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNProducto.php(38): CodeIgniter\Model->__get('session')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(111): App\Models\CLN\CLNProducto->Render_ver(62, Object(App\Models\CEN\CENAutenticacionService))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(62)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-09-11 17:44:43 --> Argument 5 passed to App\Models\CLN\CLNProducto::Get_Producto() must be of the type string, null given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNProducto.php on line 43
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNProducto.php(43): App\Models\CLN\CLNProducto->Get_Producto(Object(App\Models\CEN\CENDataService), 2, 1, 1, NULL, NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(111): App\Models\CLN\CLNProducto->Render_ver(62, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(62)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-09-11 17:45:21 --> Argument 5 passed to App\Models\CLN\CLNProducto::Get_Producto() must be of the type string, null given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNProducto.php on line 43
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNProducto.php(43): App\Models\CLN\CLNProducto->Get_Producto(Object(App\Models\CEN\CENDataService), 2, 1, 1, NULL, NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(111): App\Models\CLN\CLNProducto->Render_ver(62, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(62)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-09-11 21:57:52 --> Array to string conversion
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\compra\crear.php(5): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', 'D:\\WIN_INSTALAD...', 5, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('compra/crear', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('compra/crear', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Compra.php(38): App\Controllers\BaseController->ConstruirMenu('compra/crear', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Compra->crear()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Compra))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
