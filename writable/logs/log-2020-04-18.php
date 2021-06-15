<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-18 10:50:29 --> Undefined variable: Id_Usuario
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/usuario/crear.php(8): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 8, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('usuario/crear', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('usuario/crear', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Usuario.php(49): App\Controllers\BaseController->ConstruirMenu('usuario/crear', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Usuario->crear(2)
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-04-18 17:08:44 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 33, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-18 19:11:21 --> session_start(): Failed to decode session object. Session has been destroyed
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'session_start()...', '/home/n4iram7ws...', 1001, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Session/Session.php(1001): session_start()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Session/Session.php(237): CodeIgniter\Session\Session->startSession()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Config/Services.php(773): CodeIgniter\Session\Session->start()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/Config/BaseService.php(119): CodeIgniter\Config\Services::session(Object(Config\App), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/Config/Services.php(754): CodeIgniter\Config\BaseService::getSharedInstance('session', NULL)
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(38): CodeIgniter\Config\Services::session()
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(820): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-04-18 19:11:23 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(163): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 163, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-18 19:11:31 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 119, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(119): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-04-18 19:11:44 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 119, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(119): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-04-18 19:11:46 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 119, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(119): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-04-18 19:11:50 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 33, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-18 20:27:53 --> Array and string offset access syntax with curly braces is deprecated
#0 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(364): CodeIgniter\Debug\Exceptions->errorHandler(8192, 'Array and strin...', 'C:\\xampp\\htdocs...', 603, Array)
#1 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(364): require_once()
#2 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('CodeIgniter\\Ent...')
#4 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('CodeIgniter\\Ent...')
#5 C:\xampp\htdocs\ccadmin\app\Models\CEN\CENResponse.php(7): spl_autoload_call('CodeIgniter\\Ent...')
#6 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(364): require_once('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\CEN\\...')
#9 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\CEN\\...')
#10 C:\xampp\htdocs\ccadmin\app\Controllers\Login.php(24): spl_autoload_call('App\\Models\\CEN\\...')
#11 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#12 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#13 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#14 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#15 {main}
CRITICAL - 2020-04-18 20:30:14 --> Access denied for user '****'@'localhost' (using password: YES)
#0 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(376): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(642): CodeIgniter\Database\BaseConnection->initialize()
#2 C:\xampp\htdocs\ccadmin\app\Models\CAD\CADLogin.php(27): CodeIgniter\Database\BaseConnection->query('CALL sp_cixmart...', Array)
#3 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNLogin.php(22): App\Models\CAD\CADLogin->Autentificar('74285109', '1q2w3e4r5t6y')
#4 C:\xampp\htdocs\ccadmin\app\Controllers\Login.php(37): App\Models\CLN\CLNLogin->Autentificar('74285109', '1q2w3e4r5t6y')
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-04-18 20:31:19 --> PROCEDURE db_cixmart.sp_cixmart_get_usuario does not exist
#0 C:\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query('CALL sp_cixmart...')
#1 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute('CALL sp_cixmart...')
#2 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery('CALL sp_cixmart...')
#3 C:\xampp\htdocs\ccadmin\app\Models\CAD\CADLogin.php(27): CodeIgniter\Database\BaseConnection->query('CALL sp_cixmart...', Array)
#4 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNLogin.php(22): App\Models\CAD\CADLogin->Autentificar('74285109', '1q2w3e4r5t6y')
#5 C:\xampp\htdocs\ccadmin\app\Controllers\Login.php(37): App\Models\CLN\CLNLogin->Autentificar('74285109', '1q2w3e4r5t6y')
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#8 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
CRITICAL - 2020-04-18 21:01:53 --> Undefined offset: 21
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(184): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'C:\\xampp\\htdocs...', 184, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), NULL, 21, 0)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-18 21:02:02 --> Undefined offset: 21
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(184): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'C:\\xampp\\htdocs...', 184, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), NULL, 21, 0)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-18 21:03:09 --> Undefined offset: 22
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(184): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'C:\\xampp\\htdocs...', 184, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), NULL, 22, 0)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-18 21:04:02 --> Undefined offset: 21
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(184): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'C:\\xampp\\htdocs...', 184, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), NULL, 21, 0)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-18 21:05:28 --> Undefined offset: 21
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(186): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'C:\\xampp\\htdocs...', 186, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), NULL, 21, 0)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-18 21:05:56 --> Undefined offset: 21
#0 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(186): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', 'C:\\xampp\\htdocs...', 186, Array)
#1 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), NULL, 21, 0)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(163): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-18 22:26:02 --> Undefined index: Cod_ParSis
#0 C:\xampp\htdocs\ccadmin\app\Views\categoriaproducto\crear.php(108): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 108, Array)
#1 C:\xampp\htdocs\ccadmin\system\View\View.php(235): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('categoriaproduc...', Array, NULL)
#3 C:\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('categoriaproduc...', Array)
#4 C:\xampp\htdocs\ccadmin\app\Controllers\Categoriaproducto.php(75): App\Controllers\BaseController->ConstruirMenu('categoriaproduc...', Array)
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('6')
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
