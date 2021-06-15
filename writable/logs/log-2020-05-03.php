<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-05-03 18:59:29 --> Too few arguments to function App\Controllers\Talonario::crear(), 0 passed in C:\xampp\htdocs\ccadmin\system\CodeIgniter.php on line 844 and exactly 1 expected
#0 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Talonario->crear()
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Talonario))
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-05-03 20:13:06 --> Undefined variable: l_List_TipTalonario
#0 C:\xampp\htdocs\ccadmin\app\Views\talonario\crear.php(63): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 63, Array)
#1 C:\xampp\htdocs\ccadmin\system\View\View.php(235): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('talonario/crear', Array, NULL)
#3 C:\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('talonario/crear', Array)
#4 C:\xampp\htdocs\ccadmin\app\Controllers\Talonario.php(47): App\Controllers\BaseController->ConstruirMenu('talonario/crear', Array)
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Talonario->crear()
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Talonario))
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-05-03 20:13:30 --> Undefined index: Cod_ParSis
#0 C:\xampp\htdocs\ccadmin\app\Views\talonario\crear.php(64): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 64, Array)
#1 C:\xampp\htdocs\ccadmin\system\View\View.php(235): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('talonario/crear', Array, NULL)
#3 C:\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('talonario/crear', Array)
#4 C:\xampp\htdocs\ccadmin\app\Controllers\Talonario.php(47): App\Controllers\BaseController->ConstruirMenu('talonario/crear', Array)
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Talonario->crear()
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Talonario))
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
