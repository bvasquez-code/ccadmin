<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-02-08 09:19:24 --> Undefined variable: List_TipoMonedas
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/crear.php(94): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 94, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/cre...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(26): App\Controllers\BaseController->ConstruirMenu('stockmanual/cre...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-02-08 11:42:04 --> array_push() expects parameter 1 to be array, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'array_push() ex...', '/home/n4iram7ws...', 53, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADStockmanual.php(53): array_push(NULL, Object(App\Models\CEN\CENTienda))
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNStockmanual.php(27): App\Models\CAD\CADStockmanual->Get_Tienda(0)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(28): App\Models\CLN\CLNStockmanual->Get_Tienda(0)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-02-08 21:14:27 --> syntax error, unexpected '->' (T_OBJECT_OPERATOR)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('/home/n4iram7ws...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\CLN\\...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\CLN\\...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(26): spl_autoload_call('App\\Models\\CLN\\...')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-02-08 21:18:50 --> Too few arguments to function App\Models\CLN\CLNStockmanual::Get_Tienda(), 1 passed in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php on line 28 and exactly 2 expected
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(28): App\Models\CLN\CLNStockmanual->Get_Tienda(1)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-02-08 21:33:38 --> Undefined index: Id_Tienda
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/crear.php(60): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 60, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/cre...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(36): App\Controllers\BaseController->ConstruirMenu('stockmanual/cre...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-02-08 21:33:59 --> Undefined index: Id_Tienda
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/crear.php(60): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 60, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/cre...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(36): App\Controllers\BaseController->ConstruirMenu('stockmanual/cre...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-02-08 21:35:32 --> Undefined index: Id_Tienda
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/crear.php(60): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 60, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/cre...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(36): App\Controllers\BaseController->ConstruirMenu('stockmanual/cre...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-02-08 21:36:35 --> Undefined index: Id_Tienda
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/crear.php(60): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 60, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/cre...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(36): App\Controllers\BaseController->ConstruirMenu('stockmanual/cre...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-02-08 21:37:47 --> Undefined index: Id_Tienda
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/crear.php(60): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 60, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/cre...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/cre...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(36): App\Controllers\BaseController->ConstruirMenu('stockmanual/cre...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
