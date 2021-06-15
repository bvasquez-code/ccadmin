<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-13 15:17:28 --> Undefined variable: Item
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\preventa\producto.php(17): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', 'D:\\WIN_INSTALAD...', 17, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('preventa/produc...', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('preventa/produc...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(168): App\Controllers\BaseController->ConstruirMenu('preventa/produc...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->producto(53)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-13 15:17:49 --> Undefined index: Des_ProductoImg_Urlp
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\preventa\producto.php(17): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 17, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('preventa/produc...', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('preventa/produc...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(168): App\Controllers\BaseController->ConstruirMenu('preventa/produc...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->producto(53)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
