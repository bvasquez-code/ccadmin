<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-03-15 11:59:56 --> You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= ''' at line 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(88): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(136): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(7, 0, 'Cod_Cfpsis,Des_...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(7, 0, 'Cod_Cfpsis,Des_...', Array)
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(94): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(7, 0, 'Cod_Cfpsis,Des_...', Array)
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-03-15 12:11:56 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(120): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 120, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-03-15 12:12:31 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(120): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 120, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-03-15 13:15:32 --> Undefined variable: l_LNGenerico
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(120): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 120, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-03-15 13:38:41 --> Cannot use object of type App\Models\CEN\CENMoneda as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('facturacion/cre...', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('facturacion/cre...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(134): App\Controllers\BaseController->ConstruirMenu('facturacion/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-03-15 13:39:27 --> Cannot use object of type App\Models\CEN\CENMoneda as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('facturacion/cre...', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('facturacion/cre...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(135): App\Controllers\BaseController->ConstruirMenu('facturacion/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-03-15 14:00:22 --> syntax error, unexpected '$l_Parbusqueda' (T_VARIABLE)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('/home/n4iram7ws...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\CLN\\...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\CLN\\...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(67): spl_autoload_call('App\\Models\\CLN\\...')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-03-15 14:01:42 --> syntax error, unexpected ';', expecting ')'
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Router/Router.php(191): CodeIgniter\Router\Router->autoRoute('facturacion/cre...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(722): CodeIgniter\Router\Router->handle('facturacion/cre...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(295): CodeIgniter\CodeIgniter->tryToRouteIt(Object(CodeIgniter\Router\RouteCollection))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
