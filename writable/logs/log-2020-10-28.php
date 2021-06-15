<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-28 11:53:47 --> Undefined index: Cod_Ruc
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\compra\crear.php(25): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 25, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('compra/crear', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('compra/crear', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Compra.php(41): App\Controllers\BaseController->ConstruirMenu('compra/crear', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Compra->crear()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Compra))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-10-28 20:17:06 --> Default value for property of type App\Models\CEN\CENAutenticacionService may not be null. Use the nullable type ?App\Models\CEN\CENAutenticacionService to allow null default value
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-10-28 20:17:16 --> Default value for property of type App\Models\CEN\CENAutenticacionService may not be null. Use the nullable type ?App\Models\CEN\CENAutenticacionService to allow null default value
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
