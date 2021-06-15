<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-11-05 18:06:22 --> Undefined property: CodeIgniter\View\View::$session
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\home\index.php(392): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', 'D:\\WIN_INSTALAD...', 392, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('home/index', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(67): view('home/index', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Home.php(7): App\Controllers\BaseController->ConstruirMenu('')
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Home->index()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-11-05 18:07:13 --> Undefined property: CodeIgniter\View\View::$session
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\preventa\listar.php(1): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', 'D:\\WIN_INSTALAD...', 1, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('preventa/listar', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('preventa/listar', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(37): App\Controllers\BaseController->ConstruirMenu('preventa/listar', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-11-05 18:13:50 --> Undefined variable: Datos_Sesion
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\home\sidebar.php(6): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', 'D:\\WIN_INSTALAD...', 6, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('home/sidebar', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(59): view('home/sidebar', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(37): App\Controllers\BaseController->ConstruirMenu('preventa/listar', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-11-05 19:04:52 --> Cannot use object of type App\Models\CEN\CENResultBusqueda as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Opcionesmenu->crear('3')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Opcionesmenu))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-11-05 21:00:35 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 38, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-11-05 21:58:41 --> Cannot use object of type App\Models\CEN\CENMenu as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('perfilusuario/c...', Array, NULL)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(64): view('perfilusuario/c...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Perfilusuario.php(53): App\Controllers\BaseController->ConstruirMenu('perfilusuario/c...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Perfilusuario->crear('6')
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
