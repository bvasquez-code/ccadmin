<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-11-21 18:17:53 --> Cannot use object of type stdClass as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('compra/stockfis...', Array, NULL)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(64): view('compra/stockfis...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Compra.php(56): App\Controllers\BaseController->ConstruirMenu('compra/stockfis...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Compra->stockfisico(50)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Compra))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-11-21 18:18:25 --> Cannot use object of type stdClass as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('compra/stockfis...', Array, NULL)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(64): view('compra/stockfis...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Compra.php(56): App\Controllers\BaseController->ConstruirMenu('compra/stockfis...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Compra->stockfisico(50)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Compra))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-11-21 18:18:34 --> Cannot use object of type stdClass as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('compra/stockfis...', Array, NULL)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(64): view('compra/stockfis...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Compra.php(56): App\Controllers\BaseController->ConstruirMenu('compra/stockfis...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Compra->stockfisico(50)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Compra))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-11-21 20:37:41 --> Trying to access array offset on value of type null
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNAlmacen.php(124): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'D:\\WIN_INSTALAD...', 124, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(217): App\Models\CLN\CLNAlmacen->Get_AlmacenStock_Producto(Array)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(72): App\Models\CLN\CLNPreventa->Render_Producto(21, Object(App\Models\CEN\CENAutenticacionService))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->producto(21)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-11-21 22:37:09 --> Too few arguments to function App\Models\CLN\CLNAlmacen::Get_AlmacenStock_Producto(), 1 passed in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php on line 217 and exactly 2 expected
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(217): App\Models\CLN\CLNAlmacen->Get_AlmacenStock_Producto(Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(72): App\Models\CLN\CLNPreventa->Render_Producto(13, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->producto(13)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-11-21 22:37:58 --> Too few arguments to function App\Models\CLN\CLNAlmacen::Get_AlmacenStock_Producto(), 1 passed in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php on line 217 and exactly 2 expected
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(217): App\Models\CLN\CLNAlmacen->Get_AlmacenStock_Producto(Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(72): App\Models\CLN\CLNPreventa->Render_Producto(13, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->producto(13)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
