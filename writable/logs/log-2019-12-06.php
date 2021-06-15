<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-12-06 00:04:07 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 59, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(59): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('10')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-12-06 12:37:55 --> Cannot use object of type App\Models\CEN\CENResultBusqueda as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->config('1')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-06 12:42:11 --> Cannot use object of type App\Models\CEN\CENResultBusqueda as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->config('1')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-06 12:56:00 --> Undefined variable: l_Seleccion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/preventa/crear.php(37): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 37, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('preventa/crear', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('preventa/crear', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(50): App\Controllers\BaseController->ConstruirMenu('preventa/crear', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-12-06 14:46:45 --> Cannot use object of type App\Models\CEN\CENResultBusqueda as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->crear('13')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-06 16:05:26 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(26): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-12-06 16:05:26 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(26): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-12-06 16:05:26 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(26): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-12-06 16:14:23 --> Unknown column 'Flg_ParSis_Bo2' in 'field list'
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(75): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(123): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(13, 0, 'Cod_Cfpsis,Des_...', NULL)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(13, 0, 'Cod_Cfpsis,Des_...', NULL)
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(47): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(13, 0, 'Cod_Cfpsis,Des_...')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->crear()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
