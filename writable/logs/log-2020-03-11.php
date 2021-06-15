<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-03-11 22:00:53 --> Undefined variable: Obj_FechaListado
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/kardex/listar.php(26): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('kardex/listar', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('kardex/listar', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Kardex.php(19): App\Controllers\BaseController->ConstruirMenu('kardex/listar', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Kardex->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-03-11 22:17:49 --> syntax error, unexpected ';'
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Router/Router.php(191): CodeIgniter\Router\Router->autoRoute('kardex')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(722): CodeIgniter\Router\Router->handle('kardex')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(295): CodeIgniter\CodeIgniter->tryToRouteIt(Object(CodeIgniter\Router\RouteCollection))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-03-11 22:38:04 --> You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '? AND Flg_Marcabaja = ?  AND Cod_Cfsis_FK = ?  AND Num_Cfpsis_Sm2 = ?  AND Num_C' at line 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(85): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(133): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(47): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->index()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-03-11 22:41:00 --> Cannot use object of type App\Models\CEN\CENParsistema as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('kardex/listar', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('kardex/listar', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Kardex.php(39): App\Controllers\BaseController->ConstruirMenu('kardex/listar', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Kardex->index()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-03-11 23:16:13 --> Return value of App\Controllers\Kardex::Get_List_Mov_Kardex() must be an instance of App\Models\CEN\CENResponse, string returned
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Kardex->Get_List_Mov_Kardex()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-03-11 23:16:58 --> Return value of App\Controllers\Kardex::Get_List_Mov_Kardex() must be an instance of App\Models\CEN\CENResponse, string returned
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Kardex->Get_List_Mov_Kardex()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-03-11 23:18:10 --> Return value of App\Controllers\Kardex::Get_List_Mov_Kardex() must be an instance of App\Models\CEN\CENResponse, string returned
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Kardex->Get_List_Mov_Kardex()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-03-11 23:18:47 --> Return value of App\Controllers\Kardex::Get_List_Mov_Kardex() must be an instance of App\Models\CEN\CENResponse, string returned
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Kardex->Get_List_Mov_Kardex()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
