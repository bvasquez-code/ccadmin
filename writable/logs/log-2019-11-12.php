<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-12 21:13:38 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 46, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(46): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-12 21:13:38 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 46, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(46): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-12 21:13:38 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 46, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(46): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-12 21:14:50 --> Class 'App\Controllers\LNMarcaproducto' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-11-12 21:37:00 --> Undefined index: Id_CategoriaPro
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/producto/crear.php(45): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 45, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('producto/crear', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('producto/crear', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(88): App\Controllers\BaseController->ConstruirMenu('producto/crear', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('19')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-11-12 21:37:47 --> Undefined index: Id_CategoriaPro
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/producto/crear.php(45): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 45, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('producto/crear', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('producto/crear', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(90): App\Controllers\BaseController->ConstruirMenu('producto/crear', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('19')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-11-12 22:22:00 --> json_decode() expects parameter 1 to be string, array given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'json_decode() e...', '/home/n4iram7ws...', 44, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(44): json_decode(Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('19')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-12 22:22:25 --> Use of undefined constant l_List_TipoDescuento - assumed 'l_List_TipoDescuento' (this will throw an Error in a future version of PHP)
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(93): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/home/n4iram7ws...', 93, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('19')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-12 22:26:24 --> Cannot use object of type stdClass as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('producto/crear', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('producto/crear', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(98): App\Controllers\BaseController->ConstruirMenu('producto/crear', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('19')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-11-12 22:29:00 --> json_decode() expects parameter 1 to be string, array given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'json_decode() e...', '/home/n4iram7ws...', 44, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(44): json_decode(Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear('19')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
