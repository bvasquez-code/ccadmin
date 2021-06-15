<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-01-04 12:37:10 --> syntax error, unexpected 'return' (T_RETURN)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Router/Router.php(191): CodeIgniter\Router\Router->autoRoute('preventa')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(722): CodeIgniter\Router\Router->handle('preventa')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(295): CodeIgniter\CodeIgniter->tryToRouteIt(Object(CodeIgniter\Router\RouteCollection))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-01-04 12:37:15 --> syntax error, unexpected 'return' (T_RETURN)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Router/Router.php(191): CodeIgniter\Router\Router->autoRoute('preventa/crear')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(722): CodeIgniter\Router\Router->handle('preventa/crear')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(295): CodeIgniter\CodeIgniter->tryToRouteIt(Object(CodeIgniter\Router\RouteCollection))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-01-04 12:37:24 --> syntax error, unexpected 'return' (T_RETURN)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Router/Router.php(191): CodeIgniter\Router\Router->autoRoute('preventa')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(722): CodeIgniter\Router\Router->handle('preventa')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(295): CodeIgniter\CodeIgniter->tryToRouteIt(Object(CodeIgniter\Router\RouteCollection))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-01-04 12:54:50 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(40): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 40, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-01-04 12:55:25 --> Argument 3 passed to App\Models\CLN\CLNConfigsistema::Get_Parametros_Sistema_string() must be of the type int, string given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 38
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(38): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_string(21, 1, 'Des_Cfpsis_Tx1')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-01-04 12:55:53 --> Argument 3 passed to App\Models\CLN\CLNConfigsistema::Get_Parametros_Sistema_string() must be of the type int, string given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 38
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(38): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_string(21, 1, 'Des_Cfpsis_Tx1', NULL)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-01-04 18:21:27 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 119, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(119): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-01-04 18:21:36 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 33, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
