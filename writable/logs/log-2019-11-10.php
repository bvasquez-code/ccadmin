<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-10 15:10:52 --> Cannot use object of type App\Models\CEN\CENResponse as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('23')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-11-10 15:13:11 --> Trying to get property 'Resultado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(54): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 54, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-10 15:24:13 --> Trying to get property 'Resultado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(45): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 45, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-10 16:00:47 --> Argument 2 passed to view() must be of the type array, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php on line 57
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(57): view('home/nav', NULL)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Marcaproducto.php(32): App\Controllers\BaseController->ConstruirMenu('marcaproducto/c...', NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Marcaproducto->crear('28')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Marcaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
