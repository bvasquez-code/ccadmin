<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-11 15:35:34 --> Undefined property: CodeIgniter\View\View::$session
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/home/index.php(333): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined prope...', '/home/n4iram7ws...', 333, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('home/index', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(65): view('home/index', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Home.php(7): App\Controllers\BaseController->ConstruirMenu('')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Home->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-04-11 22:31:06 --> Undefined variable: Obj_FechaListado
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/facturacion/listar.php(29): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 29, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('facturacion/lis...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('facturacion/lis...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Usuario.php(19): App\Controllers\BaseController->ConstruirMenu('facturacion/lis...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Usuario->index()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2020-04-11 23:15:30 --> Undefined variable: List_TipoMonedas
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/usuario/crear.php(99): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 99, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('usuario/crear', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('usuario/crear', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Usuario.php(26): App\Controllers\BaseController->ConstruirMenu('usuario/crear', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Usuario->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
