<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-07-28 01:00:00 --> Undefined index: REDIRECT_QUERY_STRING
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(21): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 21, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-07-28 01:01:19 --> Undefined index: REDIRECT_QUERY_STRING
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(21): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 21, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-07-28 01:05:21 --> Argument 2 passed to App\Models\CLN\CLNReporte::Render_ReporteGananciaSKU() must be of the type array, string given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php on line 30
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(30): App\Models\CLN\CLNReporte->Render_ReporteGananciaSKU(Object(App\Models\CEN\CENAutenticacionService), 'search=hola&cat...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-07-28 01:12:45 --> Undefined index: p_Id_Periodo
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNReporte.php(37): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 37, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(30): App\Models\CLN\CLNReporte->Render_ReporteGananciaSKU(Object(App\Models\CEN\CENAutenticacionService), '?periodo=1')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-07-28 01:12:58 --> Undefined index: Id_Periodo
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNReporte.php(37): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 37, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(30): App\Models\CLN\CLNReporte->Render_ReporteGananciaSKU(Object(App\Models\CEN\CENAutenticacionService), '?periodo=1')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-07-28 01:16:48 --> Undefined index: Id_Periodo
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNReporte.php(37): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 37, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(30): App\Models\CLN\CLNReporte->Render_ReporteGananciaSKU(Object(App\Models\CEN\CENAutenticacionService), '?Id_Preventa=1')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-07-28 01:24:01 --> Undefined index: Cod_Venta
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\reporte\ReporteGananciaSKU.php(86): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 86, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('reporte/Reporte...', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('reporte/Reporte...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(34): App\Controllers\BaseController->ConstruirMenu('reporte/Reporte...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-07-28 01:24:37 --> Undefined index: Cod_Venta
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\reporte\ReporteGananciaSKU.php(86): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'D:\\WIN_INSTALAD...', 86, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('reporte/Reporte...', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('reporte/Reporte...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Reporte.php(34): App\Controllers\BaseController->ConstruirMenu('reporte/Reporte...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Reporte->ReporteGananciaSKU()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Reporte))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-07-28 02:20:29 --> Undefined offset: 1
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Views\home\sidebar.php(326): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'D:\\WIN_INSTALAD...', 326, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\View\View.php(235): include('D:\\WIN_INSTALAD...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('home/sidebar', Array, NULL)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(59): view('home/sidebar', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(49): App\Controllers\BaseController->ConstruirMenu('preventa/listar', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
