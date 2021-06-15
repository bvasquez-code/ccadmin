<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-26 11:20:55 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Categoriaproducto.php(50): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 50, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('6')
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-26 16:36:06 --> Undefined index: Id_Tienda
#0 C:\xampp\htdocs\ccadmin\app\Views\caja\crear.php(101): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 101, Array)
#1 C:\xampp\htdocs\ccadmin\system\View\View.php(235): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('caja/crear', Array, NULL)
#3 C:\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('caja/crear', Array)
#4 C:\xampp\htdocs\ccadmin\app\Controllers\Caja.php(65): App\Controllers\BaseController->ConstruirMenu('caja/crear', Array)
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Caja->crear()
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Caja))
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-04-26 17:51:48 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(119): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 119, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
