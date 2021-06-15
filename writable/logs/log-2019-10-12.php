<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-12 00:11:23 --> Use of undefined constant sp_cixmart_get_usuario - assumed 'sp_cixmart_get_usuario' (this will throw an Error in a future version of PHP)
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(18): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/home/n4iram7ws...', 18, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-12 00:12:58 --> Use of undefined constant sp_cixmart_get_usuario - assumed 'sp_cixmart_get_usuario' (this will throw an Error in a future version of PHP)
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(18): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/home/n4iram7ws...', 18, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-12 00:21:04 --> Undefined index: store
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(26): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-12 00:45:20 --> array_push() expects parameter 1 to be array, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'array_push() ex...', '/home/n4iram7ws...', 34, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(34): array_push(NULL, Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-12 00:56:28 --> Call to undefined method CodeIgniter\Session\Session::session_destroy()
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-12 01:02:50 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(34): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 34, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-10-12 01:03:14 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(34): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 34, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-10-12 01:08:00 --> Invalid file: login444.php
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(223): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('login444.php')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('login444', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(14): view('login444')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->index()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-12 01:10:31 --> Use of undefined constant dsafdsa - assumed 'dsafdsa' (this will throw an Error in a future version of PHP)
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(14): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/home/n4iram7ws...', 14, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-10-12 01:33:37 --> Call to undefined method App\Controllers\Login::Huevadas()
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-12 01:34:13 --> Call to undefined method App\Controllers\Login::session()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(32): App\Controllers\BaseController->ConstruirMenu()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-10-12 02:11:17 --> Namespace declaration statement has to be the very first statement or after any declare call in the script
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-12 02:39:44 --> Namespace declaration statement has to be the very first statement or after any declare call in the script
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-12 19:54:04 --> Undefined property: App\Controllers\Home::$load
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 54, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-10-12 19:55:13 --> Argument 3 passed to view() must be of the type array, bool given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php on line 54
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): view('home/nav', Array, true)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-10-12 20:00:25 --> Undefined property: CodeIgniter\View\View::$session
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/home/nav.php(84): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 84, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('home/nav', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): view('home/nav', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-12 20:01:01 --> Undefined property: CodeIgniter\View\View::$session
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/home/nav.php(84): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 84, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('home/nav', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): view('home/nav', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-12 20:02:13 --> Undefined property: CodeIgniter\View\View::$session
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/home/nav.php(84): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 84, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('home/nav', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): view('home/nav', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-12 20:02:41 --> Undefined property: CodeIgniter\View\View::$session
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/home/nav.php(84): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 84, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('home/nav', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): view('home/nav', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-12 20:03:04 --> Undefined property: CodeIgniter\View\View::$session
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/home/nav.php(85): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 85, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('home/nav', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(54): view('home/nav', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-12 20:04:06 --> Argument 2 passed to view() must be of the type array, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php on line 61
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('home/index', NULL)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('home/index')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-10-12 21:46:20 --> syntax error, unexpected '='
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Router/Router.php(191): CodeIgniter\Router\Router->autoRoute('perfilusuario')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(722): CodeIgniter\Router\Router->handle('perfilusuario')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(295): CodeIgniter\CodeIgniter->tryToRouteIt(Object(CodeIgniter\Router\RouteCollection))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-10-12 21:48:07 --> Argument 2 passed to App\Controllers\BaseController::ConstruirMenu() must be of the type array, object given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Perfilusuario.php on line 17
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Perfilusuario.php(17): App\Controllers\BaseController->ConstruirMenu('perfilusuario/l...', Object(App\Models\CEN\CENResponse))
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Perfilusuario->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-10-12 21:49:12 --> Argument 2 passed to view() must be of the type array, object given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php on line 56
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(56): view('home/nav', Object(App\Models\CEN\CENResponse))
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Perfilusuario.php(17): App\Controllers\BaseController->ConstruirMenu('perfilusuario/l...', Object(App\Models\CEN\CENResponse))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Perfilusuario->index()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-10-12 21:53:39 --> Argument 2 passed to view() must be of the type array, object given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php on line 56
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(56): view('home/nav', Object(App\Models\CEN\CENResponse))
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Perfilusuario.php(20): App\Controllers\BaseController->ConstruirMenu('perfilusuario/l...', Object(App\Models\CEN\CENResponse))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Perfilusuario->index()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-10-12 21:54:51 --> Cannot use object of type App\Models\CEN\CENResponse as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Perfilusuario->index()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-12 22:05:25 --> Cannot use ___PHPSTORM_HELPERS\object as object because 'object' is a special class name
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-12 22:06:16 --> Cannot use ___PHPSTORM_HELPERS\object as object because 'object' is a special class name
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-12 22:16:53 --> Undefined variable: DatosFrontEnd
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/perfilusuario/listar.php(25): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 25, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('perfilusuario/l...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(63): view('perfilusuario/l...')
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Perfilusuario.php(22): App\Controllers\BaseController->ConstruirMenu('perfilusuario/l...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Perfilusuario->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
