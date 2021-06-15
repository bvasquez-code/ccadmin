<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-27 13:21:19 --> Trying to access array offset on value of type null
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNProducto.php(43): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'D:\\WIN_INSTALAD...', 43, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(111): App\Models\CLN\CLNProducto->Render_ver(65, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-09-27 13:37:10 --> Undefined variable: Obj_OtrOpeComerciales
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(4): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', 'D:\\WIN_INSTALAD...', 4, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-27 13:40:43 --> Undefined index: Des_OpeComercial
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(15): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 15, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-27 13:41:28 --> Undefined index: Cod_Tienda
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(58): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 58, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-27 13:47:55 --> Undefined variable: Obj_OtrOpeComerciales
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(80): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', 'D:\\WIN_INSTALAD...', 80, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-27 14:05:08 --> Undefined index: Des_Tienda
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(102): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 102, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-27 14:13:27 --> Undefined index: Des_Descuento
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(125): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 125, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-09-27 22:57:21 --> Undefined variable: Item
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\producto\ver.php(98): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', 'D:\\WIN_INSTALAD...', 98, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('producto/ver', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('producto/ver', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Producto.php(116): App\Controllers\BaseController->ConstruirMenu('producto/ver', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Producto->ver(65)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
